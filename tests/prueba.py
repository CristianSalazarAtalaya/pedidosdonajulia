import pytest
import requests
import json

#  main_url = "http://localhost/pedidosdonajulia"


url = "http://localhost/pedidosdonajulia/user/login"
url = "http://localhost/pedidosdonajulia/correlative/index"
data = { 'username' : 'admin', 'password' : 'asd'}
response = requests.post(url,data=data)
print(response.text)
