(function() {
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');

    if(status == 'sucesso') {
        alert('E-mail enviado com sucesso');
    } else if(status == 'erro') {
        alert('Falha ao enviar o e-mail, tente novamente mais tarde');
    }
});