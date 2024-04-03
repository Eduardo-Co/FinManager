import requests
import os

url_token = 'http://127.0.0.1:8000/api/sanctum/token'
url_teste = 'http://127.0.0.1:8000/api/teste'

# Substitua isso pelas credenciais do usuário
data = {
    'email': 'edubrcardozo23@gmail.com',
    'password': 'salinas132',
    'device_name': 'PythonRequisiton',
}

response_token = requests.post(url_token, data=data)

if response_token.status_code == 200:

    print("Token de autenticação obtido com sucesso.")
    token = response_token.text
    print(token)


    headers = {
        'Authorization': 'Bearer ' + token
    }

    response_teste = requests.post(url_teste, headers=headers)

    if response_teste.status_code == 200:
        print("Redirecionamento para rota /teste bem-sucedido.")

        print(response_teste.text)
    else:
        print("Erro ao redirecionar para rota /teste. Status:", response_teste.status_code)
else:
    conteudo = f"{response_token.text}\nErro ao solicitar token de autenticação. Status: {response_token.status_code}"
    caminho_arquivo = os.path.join(os.path.expanduser('~'), 'Desktop', 'saida.txt')
    with open(caminho_arquivo, 'w', encoding='utf-8') as arquivo:
     arquivo.write(conteudo)

    print("Erro ao solicitar token de autenticação. Status:", response_token.status_code)
