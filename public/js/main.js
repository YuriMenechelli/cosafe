$(document).ready(function() {
    setTimeout(carregar_dados, 3000);
    $('#datatable').DataTable( {
        "language": {
            "lengthMenu": "Exibindo _MENU_ registros por página",
            "zeroRecords": "Nada encontrado",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro disponível",
            "infoFiltered": "(filtrado _MAX_ registros no total)",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
        }
    });
});

function carregar_dados() {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: '/cosafe/models/conectar.php',

        success: function (msg) {
            $('#ppm').html(msg.valor + '<sup>ppm</sup>');
            var valor = $("#valor").attr('data-value');
            var val = $(this).attr('data-value');
            valor_recebido = valor.value = msg.valor;

            $(".progress").each(function() {

                $(this).data('value', msg.valor);
                value = $(this).data('value');
                var left = $(this).find('.progress-left .progress-bar');
                var right = $(this).find('.progress-right .progress-bar');

                left.removeClass('border-primary');
                right.removeClass('border-primary');


                if (value > 0) {
                  if (value <= 50) {
                    right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)');
                    left.css('transform', 'rotate(' + percentageToDegrees(0) + 'deg)');
                    right.removeClass('border-warning');
                    left.removeClass('border-warning');
                    right.removeClass('border-danger');
                    left.removeClass('border-danger');

                    right.addClass('border-success');
                    left.addClass('border-success');
                  } 
                  if (value > 50) {
                    right.css('transform', 'rotate(180deg)');
                    left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)');
                    right.removeClass('border-success');
                    left.removeClass('border-success');
                    right.removeClass('border-danger');
                    left.removeClass('border-danger');

                    right.addClass('border-warning');
                    left.addClass('border-warning');
                  }
                  if (value > 87) {
                    right.removeClass('border-success');
                    left.removeClass('border-success');
                    right.removeClass('border-warning');
                    left.removeClass('border-warning');

                    right.addClass('border-danger');
                    left.addClass('border-danger');
                  }
                }
              })

              function percentageToDegrees(percentage) {

                return percentage / 300 * 360

              }
        },

        complete: function (msg) { 
            setTimeout (carregar_dados, 3000); 
        }
  
    });
}
// Exportar para Excel ignorando colunas com imagens e links
        function fnExcelReport(){

            var tab_text="<table border='2px'>";
            var textRange; 
            var j=0;
            tab = document.getElementById('datatable').cloneNode(true);


            for(j = 0 ; j < tab.rows.length ; j++)
            {
                var row = tab.rows[j];
                var numberOfCells = row.cells.length;
                
                tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
            }

            tab_text=tab_text+"</table>";
            tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if you want links in your table
            tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if you want images in your table
            tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // remove input params

            var ua = window.navigator.userAgent;
            var msie = ua.indexOf("MSIE ");
            tab_text = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><meta charset="utf-8"/><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>Relatório Geral</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body>' + tab_text + '</body></html>';

            if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
            {
                txtArea1.document.open("txt/html","replace");
                txtArea1.document.write(tab_text);
                txtArea1.document.close();
                txtArea1.focus();
                sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Submit.xls");
            }
            else                 //other browser not tested on IE 11
                var link = document.createElement('a');
                link.download = "download.xls";
                link.href = 'data:application/vnd.ms-excel,' + encodeURIComponent(tab_text);
                link.click();
        }
