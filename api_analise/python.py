from flask import Flask, request, jsonify
import os
import json
import numpy as np


#Somente para Teste do FLASK, poderia ser tudo feito no laravel


app = Flask(__name__)
os.environ['http_proxy'] = ''
os.environ['https_proxy'] = ''

@app.route('/laravel-requisicao', methods=['POST'])
def grafico():
    data = request.json
    if data:
        print('\n\nDados recebidos')
        print(data)
        print('\n')
        resultados = tratar_dados(data)


        resultados_json = {
            "valor_total": resultados[0],
            "valor_investido": resultados[1],
            "juros": resultados[2]
        }



        return jsonify(resultados_json)
    else:
        print('Nao Recebido ERRO: '+ request.content_encoding)

def tratar_dados(data):
    data = json.loads(data)

    saldo_atual =  float(data['saldo_atual'])
    duracao = float(data['duracao'])
    juros = float(data['retorno_mensal'])/100
    aporte_mensal = float(data['investimento_mensal'])

    print("saldo_atual:", saldo_atual)
    print("duracao:", duracao)
    print("juros:", juros)
    print("aporte_mensal:", aporte_mensal)

    print('\n\n')

    final_total, final_investido, final_juros = calcular_valor(saldo_atual, aporte_mensal, juros, duracao)
    print("Valor Total:", final_total)
    print("Valor Investido:", final_investido)
    print("Juros:", final_juros)

    return final_total, final_investido, final_juros

def calcular_valor(saldo_atual, aporte_mensal, juros, duracao):
    valor_total = saldo_atual * (1 + juros) ** duracao + aporte_mensal * (((1 + juros) ** duracao - 1) / juros)
    valor_investido = saldo_atual + aporte_mensal * duracao
    valor_juros = valor_total - valor_investido

    return "{:.2f}".format(valor_total), "{:.2f}".format(valor_investido), "{:.2f}".format(valor_juros)

if __name__ == '__main__':
    app.run(debug=True)
