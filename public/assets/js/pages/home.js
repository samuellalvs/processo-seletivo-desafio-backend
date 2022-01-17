function getUserData() {
    api.get('/api/user/data', {
        headers: {
            'Authorization': `Bearer ${localStorage.getItem('@picpay:token')}`
        }
    }).then(response => {
        console.log(response);
        document.getElementById('name').innerHTML = response.data.user.name;
        document.getElementById('bankBalance').innerHTML = new Intl.NumberFormat('pt-BR', {
            style: 'currency',
            currency: 'BRL'
        }).format(response.data.user.bank_balance.amount);

        response.data.services.map(service => {
            const template = document.createElement('div');
            template.classList.add('services-wrapper');
            template.innerHTML = `
            <a href="${service.route}">
                <i class="${service.icon}"></i>
                ${service.name}
            </a>`;

            var content = document.getElementById("content");
            content.appendChild(template);

        });
    }).catch(() => {
        alert('Ocorreu um erro ao carregar os dados do usuário');
    });
}

getUserData();

function signOut() {
    api.post('/api/user/signOut', {}, {
        headers: {
            'Authorization': `Bearer ${localStorage.getItem('@picpay:token')}`
        }
    }).then(response => {
        if (response.data.data === 'success') {
            localStorage.removeItem('@picpay:token');
            window.location.replace("/");
        }

    }).catch(() => {
        alert('Ocorreu um erro ao efetuar o logout');
    });
}