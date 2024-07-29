$(document).ready(function() {

    const validateEmail = (email) => /^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/.test(email);

    $(".send-form").off().on('click', function(e){
        e.preventDefault();
        
        let errorContainer = $(".errors");
        let errors = $(".errors").find('label');

        errorContainer.hide();
        errors.empty();

        let params = {
                        name: $("#name").val() || null,
                        email: $("#email").val() || null,
                        phone: $("#phone").val() || null,
                        country: $("#country").val() || null,
                        leadSource: $("#lead-source").val() || null,

        };

        if(!params.name){
            errors.text('Por favor, completa tu nombre.');
            errorContainer.fadeIn(500);
        } else if(!params.email || !validateEmail(params.email)){
            errors.text('Por favor completa tu e-mail con uno válido.');
            errorContainer.fadeIn(500);
        } else if(!params.phone){
             errors.text('Por favor, completa tu teléfono.');
            errorContainer.fadeIn(500);
        } else if(!params.country){
             errors.text('Por favor, completa tu país.');
            errorContainer.fadeIn(500);
        } else if(!params.leadSource || params.leadSource == "select"){
             errors.text('Por favor, completa cómo supiste de nosotros.');
            errorContainer.fadeIn(500);
        } else {
            $(".send-form").hide();
            errorContainer.text('Aguarda mientras enviamos el formulario');
            errorContainer.fadeIn(500);

            $.ajax({
                url: 'https://agenciadores.com/php/email.php',
                type: 'POST',
                data: params,
                success: function(d){
                    if(d.status !== 'success'){
                        $("#howDidYouHearId").css("display", "none");
                        errorContainer.text(d.message);
                        $(".send-form").fadeIn(500);
                        return; 
                    }

                    errorContainer.text('Gracias! Recibimos tu solicitud con éxito.');
                    return;
                },
                error: function(xhr, status, error){
                    errorContainer.text('Error al enviar el formulario.');
                    $(".send-form").fadeIn(500);
                }
            });

        }

    });

});