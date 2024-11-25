const button = document.querySelector('submit');

const handleSubmit = (event) => {
    event.preventDefault();

    const email = document.querySelector('input[name=email]').value;

    fetch('https://sheetdb.io/api/v1/s58jw1bg7yuhf', {
        method: 'post',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            email
        })
    });
    
    $('input[name=email]').val('');
    alert('E-mail enviado com sucesso!');
   
}
document.querySelector('form').addEventListener('submit', handleSubmit)