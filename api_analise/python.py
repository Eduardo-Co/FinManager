from flask import Flask, request, render_template
import os
import json
import matplotlib.pyplot as plt

app = Flask(__name__)
os.environ['http_proxy'] = ''
os.environ['https_proxy'] = ''

@app.route('/laravel-requisicao', methods=['POST'])
def grafico():
    data = request.json
    if data:
        resultados = tratar_dados(data)

        # Gerar gráfico com base nos resultados
        plt.figure(figsize=(8, 6))
        valores = ['Valor Total', 'Valor Investido', 'Juros']
        valores_resultados = list(resultados)
        plt.bar(valores, valores_resultados)
        plt.title('Resultados do Investimento')
        plt.xlabel('Tipo')
        plt.ylabel('Valor')
        plt.grid(True)

        # Salvar o gráfico
        graph_path = os.path.join('static', 'graph.png')
        plt.savefig(graph_path)
        plt.close()

        return render_template('grafico.html')
    else:
        return 'Erro: Nenhum dado recebido'

def tratar_dados(data):
    saldo_atual = float(data['saldo_atual'])
    duracao = float(data['duracao'])
    juros = float(data['retorno_mensal']) / 100
    aporte_mensal = float(data['investimento_mensal'])

    final_total, final_investido, final_juros = calcular_valor(saldo_atual, aporte_mensal, juros, duracao)

    return final_total, final_investido, final_juros

def calcular_valor(saldo_atual, aporte_mensal, juros, duracao):
    valor_total = saldo_atual * (1 + juros) ** duracao + aporte_mensal * (((1 + juros) ** duracao - 1) / juros)
    valor_investido = saldo_atual + aporte_mensal * duracao
    valor_juros = valor_total - valor_investido

    return valor_total, valor_investido, valor_juros

if __name__ == '__main__':
    app.run(debug=True)
