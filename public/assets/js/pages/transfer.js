function handleBack() {
    history.back();
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
                'Authorization': localStorage.getItem('@picpay:token')
            }
        }
    ).then(response => {
        console.log(response);
    }).catch(() => {
    });
}