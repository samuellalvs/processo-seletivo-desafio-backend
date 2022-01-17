function handleFormSubmit(e) {
    e.preventDefault();

    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;

    api.post('/api/user/signIn',
        {
            email,
            password
        }
    ).then(response => {
        console.log(response);
        if (response.data.data === 'success') {
            localStorage.setItem('@picpay:token', response.data.token);
            window.location.replace("/home");
        }

    }).catch(() => {
        alert('Usuário ou senha incorretos');
    });
}