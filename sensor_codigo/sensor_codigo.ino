#include <SPI.h>
#include <Ethernet.h>
#include <Wire.h> 
#include <LiquidCrystal_I2C.h>

#define MQ_analog A0

LiquidCrystal_I2C lcd(0x27,16,2);  // Criando um LCD de 16x2 no endereço 0x27

//Porta ligada ao pino IN2 do modulo
int porta_rele1 = 3;

int Pinbuzzer = 2; //PINO UTILIZADO PELO BUZZER
int PinA0 = A0; //PINO UTILIZADO PELO SENSOR DE GÁS MQ-7
 
int leitura_sensor = 100; //DEFININDO UM VALOR LIMITE (NÍVEL DE GÁS ALTO)
int leitura_media = 50; //DEFININDO UM VALOR LIMITE (NÍVEL DE GÁS MODERADO)

byte mac[] = {
    0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED
};

//VARIÁVEIS INICIALMENTE VAZIAS
int valor_analog;
int valor_dig;
String url, valor;

// Ip da placa
IPAddress ip(192,168,5,134);
IPAddress gateway(192,168,5,1);
IPAddress subnet(255, 255, 255, 0);

// Ip que será conectado
IPAddress server(192,168,5,137);

EthernetClient client;

void setup() {
  //Define pinos para o rele como saida
  pinMode(porta_rele1, OUTPUT);
  
  pinMode(PinA0, INPUT); //DEFINE O PINO COMO ENTRADA
  pinMode(Pinbuzzer, OUTPUT); //DEFINE O PINO COMO SAÍDA
  Serial.begin(9600); //INICIALIZA A SERIAL

  pinMode(9, OUTPUT);// PINO DO LED VERMELHO
  pinMode(8, OUTPUT);// PINO DO LED VERDE
  pinMode(5, OUTPUT);// PINO DO LED AMARELO
  
  digitalWrite(8, HIGH); // Ativamos o pino 12 (colocando 5v nele)

  lcd.init();             // Inicializando o LCD
  lcd.backlight();        // Ligando o BackLight do LCD

  digitalWrite(porta_rele1, LOW);  //Liga rele 1
    Serial.begin(9600);
    pinMode(PinA0, INPUT);
/* ---------------------------------------------------------------------- */
    if (Ethernet.begin(mac) == 0) {
        Serial.println("Falha ao configurar Ethernet usando o DHCP");
    }
    Ethernet.begin(mac, ip, gateway, subnet);
    delay(1000);
    Serial.println("Conectando...");
}

// Recebe valor do sensor e converte para String
String valorSensor() {
   valor_analog = analogRead(MQ_analog); 
   delay(500);
   return String(valor_analog);
 
}

void loop(){
  
  int valor_analogico = analogRead(PinA0); //VARIÁVEL RECEBE O VALOR LIDO NO PINO ANALÓGICO
  Serial.print("Leitura: "); //EXIBE O TEXTO NO MONITOR SERIAL
Serial.println(valor_analogico);// MOSTRA NO MONITOR SERIAL O VALOR LIDO DO PINO ANALÓGICO

    valor = valorSensor(); //VARIÁVEL RECEBE O VALOR LIDO NO PINO ANALÓGICO 

        url = "GET http://192.168.5.137/cosafe/arduino.php?inf=" + valor;

        Serial.println(url);
        if (client.connect(server, 80)) {
            Serial.println("Conectado!");
    
            // Faz a requisição http
            client.print(url);
            client.println(" HTTP/1.0");    
            client.println("Connection: close");
            client.println();
        } 
        else {
            Serial.println("Falha ao conectar.");
        }
    
    lcd.clear();
    lcd.setCursor(3, 0);
    lcd.print("*CO SAFE*"); // MENSAGEM EXIBIDA NO LCD;
    
    lcd.setCursor(0, 1);
    lcd.print("NIVEL:NORMAL"); // MENSAGEM EXIBIDA NO LCD;

     //VERIFICA SE O NIVEL DE MONÓXIDO(CO) ESTÁ ACIMA DO NORMAL E DENTRO DO LIMITE ACEITÁVEL
    if (valor_analogico >= leitura_media && valor_analogico < leitura_sensor) {
      lcd.clear();
      lcd.setCursor(3, 0);
      lcd.print("*CO SAFE*"); // MENSAGEM EXIBIDA NO LCD;
      lcd.setCursor(0, 1);
      lcd.print("NIVEL:REGULAR"); // MENSAGEM EXIBIDA NO LCD;
      digitalWrite(8, LOW); // DESLIGANDO O LED VERDE 
      digitalWrite(5, HIGH); //LIGANDO O LED AMARELO
      digitalWrite(Pinbuzzer, HIGH);
      delay(200);
      digitalWrite(Pinbuzzer, LOW);
      delay(1000);
    }else{
      digitalWrite(5, LOW); //DESLIGANDO LED AMARELO 
      digitalWrite(8, HIGH); // Ativamos o pino 12 (colocando 5v nele) 
      digitalWrite(Pinbuzzer, LOW);   
    }

    //VERIFICA SE O NIVEL DE MONÓXIDO DE CARBONO(CO) ULTRAPASSOU O LIMITE ACEITÁVEL
   if (valor_analogico > leitura_sensor){//SE VALOR LIDO NO PINO ANALÓGICO FOR MAIOR QUE O VALOR LIMITE, FAZ
    digitalWrite(8, LOW);//DESLIGANDO LED VERDE (PINO 11) 
    digitalWrite(5, LOW); //DESLIGANDO O LED AMARELO (PINO 10)
    digitalWrite(9, HIGH); //LIGANDO O LED VERMELHO (PINO 12)
    
    lcd.clear();
    lcd.setCursor(3, 0);
    lcd.print("*CO SAFE*"); // MENSAGEM EXIBIDA NO LCD;
    lcd.setCursor(0, 1);
    lcd.print("NIVEL:ALTO!!!"); // MENSAGEM EXIBIDA NO LCD;
    digitalWrite(Pinbuzzer, HIGH); //ATIVA O BUZZER E O MESMO EMITE O SINAL SONORO
  
    digitalWrite(porta_rele1, HIGH); //Desliga rele 1
   
   }else{ //SENÃO, FAZ
   digitalWrite(Pinbuzzer, LOW);//BUZZER DESLIGADO
   digitalWrite(9, LOW); // Desligando o LED VERMELHO
  
   digitalWrite(porta_rele1, LOW);  //Liga rele 1
   }
    delay(1000);
}
