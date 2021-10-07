document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        initialDate: '2021-01-01',
        headerToolbar: {
            left: 'prev,next today Miboton',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay',
        },
        customButtons:{
            Miboton:{
                text:"Boton",
                click:function(){
                    alert("Hola mundo");
                    $('#exampleModal').modal('show');
                }
            }
        },
        businessHours: {
            // days of week. an array of zero-based day of week integers (0=Sunday)
            daysOfWeek: [ 1, 2, 3, 4, 5 ], // Monday - Thursday          
            startTime: '08:00', // a start time (10am in this example)
            endTime: '18:00', // an end time (6pm in this example)
        },
        dateClick:function(info){
            //Limpiar formulario
            limpiarFormulario();

            // Captura el valor de la fecha y lo devuelve
            $('#txtFecha').val(info.dateStr);

            // Mostrar y ocultar botones
            $("#btnAgregar").prop("disabled",false);
            $("#btnModificar").prop("disabled",true);
            $("#btnEliminar").prop("disabled",true);

            $('#exampleModal').modal('show');
            
            // console.log(info);
            
            // Date click recupera y genera un dateStr que crea en donde se de click
            
            // calendar.addEvent({ 
            //     title:"Evento x", 
            //     date:info.dateStr,
            //     color:"#FFCCAA",
            //     textColor:"#000000" 
            // });
        },
        // permite imprimir lo que se encuentra en la info
        eventClick:function(info) {
            
            $("#btnAgregar").prop("disabled",true);
            $("#btnModificar").prop("disabled",false);
            $("#btnEliminar").prop("disabled",false);

            console.log(info);
            console.log(info.event.start);

            console.log(info.event.end);
            console.log(info.event.textColor);
            console.log(info.event.backgroundColor);

            // extendProps imprime todas los datos adicionales
            console.log(info.event.extendedProps.descripcion);  

            // Recupera el id del evento seleccionado
            $('#txtID').val(info.event.id);
            $('#txtTitulo').val(info.event.title);

            mes = (info.event.start.getMonth()+1);
            dia = (info.event.start.getDate());
            anio = (info.event.start.getFullYear());

            mes = (mes<10)?"0"+mes:mes;
            dia = (dia<10)?"0"+dia:dia;

            hora = (info.event.start.getHours());
            minuto = (info.event.start.getMinutes());

            hora = (hora<10)?"0"+hora:hora;
            minuto = (minuto<10)?"0"+minuto:minuto;

            $('#txtFecha').val(anio+"-"+mes+"-"+dia);
            $('#txtHora').val(hora+":"+minuto);

            $('#txtColor').val(info.event.backgroundColor);

            // Ata id de formulario con campos adicionales
            $('#txtDescription').val(info.event.extendedProps.descripcion);

            $('#exampleModal').modal('show');
        },
        // events:[
        //     {
        //         title:"Mi evento 1",
        //         start:"2021-09-20 12:30:00",
        //         // Datos adicionales
        //         descripcion:"Descripcion del evento 1"
        //     },{
        //         title:"Mi evento 2",
        //         start:"2021-09-21 12:30:00",
        //         end:"2021-09-28 12:30:00",
        //         color:"#FFCCAA",
        //         textColor:"#000000",
        //         // Datos adicionales
        //         descripcion:"Descripcion del evento 2",
        //         pedido:"Pedido"
        //     }
        // ]
        events:url_show
    });
    calendar.setOption('locale','Es');
    calendar.render();

    $('#btnAgregar').click(function(){
        ObjEvento=recolectarDatosGUI("POST");
        EnviarInformacion('',ObjEvento);
    });

    $('#btnEliminar').click(function(){
        ObjEvento=recolectarDatosGUI("DELETE");
        EnviarInformacion('/'+$('#txtID').val(),ObjEvento);
    });

    $('#btnModificar').click(function(){
        ObjEvento=recolectarDatosGUI("PATCH");
        EnviarInformacion('/'+$('#txtID').val(),ObjEvento);
    });

    function recolectarDatosGUI(method)
    {
        nuevoEvento={
            id:$('#txtID').val(),
            title:$('#txtTitulo').val(),
            descripcion:$('#txtDescription').val(),
            color:$('#txtColor').val(),
            textColor:'#fffff',
            start:$('#txtFecha').val()+" "+$('#txtHora').val(),
            end:$('#txtFecha').val()+" "+$('#txtHora').val(),
            '_token':$("meta[name='csrf-token']").attr("content"),
            '_method':method
        }
        return(nuevoEvento);
    }

    function EnviarInformacion(accion,objEvento){
        $.ajax(
            {
                type:"POST",
                url:url_+accion,
                data:objEvento,
                success:function(msg)
                {
                    console.log(msg);

                    $('#exampleModal').modal('toggle');
                    calendar.refetchEvents();
                },
                error:function()
                {
                    alert("Hay un error");
                }
            }    
        );
    }

    function limpiarFormulario()
    {
        $('#txtID').val("");
        $('#txtTitulo').val("");
        $('#txtFecha').val("");
        $('#txtHora').val("07:00");
        $('#txtColor').val("");
        $('#txtDescription').val("");
    }
});