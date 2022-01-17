function handleBack() {
    window.location.replace("/home");
}

function handleFormSubmit(e) {
    e.preventDefault();

    let beneficiaryRegistryNumber = document.getElementById('registryNumber').value;
    let amount = document.getElementById('amount').value;

    api.post('/api/transfer',
        {
            beneficiaryRegistryNumber,
            amount
        },
        {
            headers: {
                'Authorization': `Bearer ${localStorage.getItem('@picpay:token')}`
            }
        }
    ).then(response => {
        console.log(response);
        if (response.data.data === 'success') {
            window.alert(response.data.message);

            document.getElementById('registryNumber').value = '';
            document.getElementById('amount').value = '';
        } else {
            window.alert(response.data.message);
        }


    }).catch(() => {
        window.alert('Ocorreu um erro ao fazer a transferencia.');
    });
}