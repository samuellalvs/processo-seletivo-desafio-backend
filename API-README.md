# **PICPAY DESAFIO API**

### **POST** Login

Serviço para autenticar o usuário no sistema.

```
/api/user/signIn
```

**Request BODY**
```json
{
  "email": "usuario1@gmail.com",
  "password": "senha"
}
```

**Success response example:**

```json
{
    "data": "success",
    "token": "36|HHFRTQ84Ro7MEuQwPZ60CJvceZn67NYP4wX29Z5d"
}
```

**Failed response example:**

```json
{
    "data": "failed",
}
```

<br/><br/>

### **POST** Logout

Serviço para revogar as chaves de acesso do usuário no sistema.

```
/api/user/signOut
```

**Request HEADER**
```
Authorization: Bearer {your auth token}
```

**Response example:**
```json
{
    "data": "success"
}
```

<br/><br/>

### **POST** Create user

Serviço de criação de novo usuário no sistema.

```
/api/user/create
```

**Request BODY**
```json
{
  "name": "Samuel Alves de Lima Silva",
  "email": "samuellmsl05@gmail.com",
  "registryNumber": "123123123123",
  "type": "comum",
  "password": "senha"
}
```

**Success response example**

```json
{
    "data": "success"
}
```

**Failed response example**

```json
{
    "data": "error"
}
```

<br/><br/>

### **POST** New transfer

Serviço para efeturar uma nova transferencia bancaria entre usuarios

```
/api/transfer
```

**Request HEADER**
```
Authorization: Bearer {your auth token}
```

**Request BODY**
```json
{
  "payeeRegistryNumber": "03745798066",
  "amount": 1000
}

```
**Failed responses**

Se um usuário do tipo lojista tenta fazer uma transferencia:

```json
{
    "data": "error",
    "message": "Essa funcionalidade não está disponivel para esse tipo de usuário"
}
```

Se o saldo para fazer a transação for insuficiente:

```json
{
    "data": "error",
    "message": "Saldo insuficiente para efetuar a transação"
}
```

Se o usuário tenta fazer uma transação para sua própria conta
```json
{
    "data": "error",
    "message": "Você não pode fazer uma transação para si proprio"
}
```

Se ocorrer algum erro ao verificar a estabilidade do serviço de notificações
```json
{
    "data": "error",
    "message": "Ocorreu um erro ao verificar o serviço de notificações"
}
```

Se a transação não for autorizada
```json
{
    "data": "error",
    "message": "Ocorreu um erro de autorização"
}
```

Se o beneficiario da transação não for encontrado
```json
{
    "data": "error",
    "message": "O beneficiario da transação não foi encontrado no sistema"
}
```

**Success response example**

```json
{
    "data": "success",
    "message": "A transação foi concluida com sucesso"
}
```


<br/><br/>


### **GET** Get user data

Serviço que retorna os dados do usuário, seus dados bancarios e a listagem de serviços disponiveis para ele.

```
/api/user/data
```
**Request HEADER**
```
Authorization: Bearer {your auth token}
```

**Success response example**

```json
{
    "user": {
        "id": 1,
        "name": "Rayssa Matias Breia",
        "email": "usuario1@gmail.com",
        "registryNumber": "32362100014",
        "type": "comum",
        "email_verified_at": null,
        "created_at": null,
        "updated_at": null,
        "bank_balance": {
            "id": 1,
            "user_id": 1,
            "amount": 689900,
            "created_at": null,
            "updated_at": "2022-01-18T11:44:18.000000Z"
        }
    },
    "services": [
        {
            "name": "Fazer transferência",
            "icon": "fas fa-exchange-alt",
            "route": "http://127.0.0.1:8000/transferencia"
        }
    ]
}
```
