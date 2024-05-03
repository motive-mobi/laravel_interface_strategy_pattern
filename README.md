
# Interfaces no Laravel

 - Framework: Laravel versão 11.0
 - Banco de Dados: sqlite (padrão da instalação do framework)

## Autor

- Alexandre Tucunduva | [@motive-mobi](mailto:motive.mobi@gmail.com)


## Networking
[![linkedin](https://img.shields.io/badge/linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/alexandre-tucunduva)


## Referências

- [Laravel Docs](https://laravel.com/docs/11.x)


## Contexto

Supondo o seguinte cenário: uma aplicação precisa consultar uma API externa de dados climáticos e retornar esses dados para o front.

Afim de deixar o código com baixo acoplamento e limpo, a estratégia usada foi:

- Uso de Service Provider
- Uso de camada de abstração (Interface)
- Uso de camada de serviços (Services)

O objetivo é facilitar manutenções e implementações futuras, principalmente em integrações entre APIs (que pode ser alterada com o tempo), evitando uma refatoração extensa ou até uma reescrita completa do código.

Este é um exemplo resultante de um estudo de caso, onde temos duas fontes de integração externa (a implementação das APIs em si não faz parte do escopo deste estudo):

- https://www.weatherapi.com
- https://www.weatherbit.io

Um 'single action' controller (WeatherController) recebe a injeção da camada de abstração (WeatherDataInterface) - essa Interface apenas determina o que a classe deve fazer e não como ela deve fazer.

No Service Provider (WeatherDataServiceProvider) é feito o 'bind' da Interface e instanciadas as classes de serviços (WeatherbitIoApi e WeatherApi).

As classes de serviço tem a responsabilidade de cuidar das regras de negócio pertinentes a cada integração e também fazem a implementação da Interface.

No arquivo config/services.php foi adicionado um 'driver':
```
'weather-data-driver' => env('WEATHER_DATA_DRIVER'),
```
que tem a função de informar qual das duas APIs será utilizada na aplicação, consultando o parâmetro ```WEATHER_DATA_DRIVER="weatherbit"``` localizado no arquivo .env.

Com esta abordagem, uma alteração ou manutenção futura na implementação fica muito mais simples: basta criarmos uma nova classe de serviço (sempre implementando a Interface), registrá-la no Service Provider e alterar o 'driver' setado no arquivo .env.
