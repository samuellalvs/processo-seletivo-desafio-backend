function handleBack() {
    history.back();
}

function handleFormSubmit() {
    let registryNumber = '';
    let name = '';
    let amount = '';

    api.post('/transfer', {
        registryNumber,
        name,
        amount
    }).then(response => {
        console.log(response);
    }).catch(() => {
    });
}