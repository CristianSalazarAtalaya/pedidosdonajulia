import pytest
import requests
import json

main_url = "http://localhost/pedidosdonajulia"
user = "admin"
password = "123"

 
def test_status_admin_index():
    url = main_url + "/"
    data = {}
    response = requests.get(url,data=data)
    assert response.status_code == 200

def test_status_user_index():
    url = main_url + "/client"
    data = {}
    response = requests.get(url,data=data)
    assert response.status_code == 200

def test_status_user_admin_login():
    url = main_url + "/user/login"
    data = { 'username' : user, 'password' : password}
    response = requests.post(url,data=data)
    respuesta = 1
    if "Please check your password" in response.text:
        respuesta = 0
    assert respuesta == 1


