### About the test task

```
Implement a REST service to get the current exchange rate from
https://www.cbr-xml-daily.ru/daily_json.js

The GET request /exchange/{currency} returns the current exchange rate 
"currency" to the ruble. For example, a valid json should be returned for
the /exchange/CHF request:

{
"CHF": "1 швейцарский франк равен 75.6612 рублям"
}

The GET request / exchange should return the rate of the random
currency to the ruble. In the answer line, take into account the
declension of the word "Ruble" in numbers and cases. To identify
requests, use the X-API-KEY header with the value "123321".
Return request authorization error with invalid header.

Implement the service in PHP. Any frameworks and libraries can be used.
```

### Installation

```bach
cd ./app
```
```bash
composer install
```
### Run with symfony server
```bash
# in /app directory
./bin/console server:run
```
### Run with docker
```bash
# at the root of the project, will start the server at http://localhost:8081
docker-compose up --build -d
```