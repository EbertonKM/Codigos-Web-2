/*const button = document.querySelector('submit');
const handleSubmit = (event) => {
    event.preventDefault();
    //Inputs do formulário
    const email = document.querySelector('input[type=email]').value;
    //Endpoint do SheetDB
    fetch('https://sheetdb.io/api/v1/rdhbc9htovono', {
        method: 'post',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        body: JSON.stringify ({
            email
        })
    });
    alert('E-mail enviado com sucesso.');
    window.location.href = '';
}

document.querySelector('form').addEventListener('submit', handleSubmit);*/

const button = document.querySelector('submit');

const handleSubmit = (event) => {
    event.preventDefault();

    const email = document.querySelector('input[name=email]').value;

    fetch('https://sheetdb.io/api/v1/rdhbc9htovono', {
        method: 'post',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            email
        })
    });
   
    
    alert('E-mail enviado com sucesso!');
    //Redirecionar para página ''
    window.location.href = '';
    
   
}
document.querySelector('form').addEventListener('submit', handleSubmit)