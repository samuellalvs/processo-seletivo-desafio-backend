function handleBack() {
    window.location.replace("/home");
}

function handleFormSubmit(e) {
    e.preventDefault();

    let payeeRegistryNumber = document.getElementById('registryNumber').value;
    let amount = document.getElementById('amount').value;

    document.getElementById('submitButton').innerHTML = '<div class="lds-ring"><div></div><div></div><div></div><div></div></div>';
    document.getElementById("submitButton").disabled = true;

    api.post('/api/transfer',
        {
            payeeRegistryNumber,
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

        document.getElementById('submitButton').innerHTML = 'Confirmar transferência';
        document.getElementById("submitButton").disabled = false;
    }).catch(() => {
        window.alert('Ocorreu um erro ao fazer a transferencia.');

        document.getElementById('submitButton').innerHTML = 'Confirmar transferência';
        document.getElementById("submitButton").disabled = false;
    });
}