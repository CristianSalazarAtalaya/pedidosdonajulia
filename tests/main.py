import pytest
import requests
import json

main_url = "http://localhost/pedidosdonajulia"
admin_user = "admin"
admin_password = "123"
user_user = "user"
user_password = "123"
 
 #Paginas principales
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

#Login
def test_status_admin_login():
    url = main_url + "/user/login"
    data = { 'username' : admin_user, 'password' : admin_password}
    print('*****SETUP*****')
    response = requests.post(url,data=data)
    print('Despues del response')
    respuesta = 0
    if "Pedidos Dona Julia | Admin" in response.text:
        respuesta = 1
    print('Terminando la validación')
    assert respuesta == 1 and response.status_code == 200

def test_status_user_login():
    url = main_url + "/user/login"
    data = { 'username' : user_user, 'password' : user_password}
    print('*****SETUP*****')
    response = requests.post(url,data=data)
    print('Despues del response')
    respuesta = 0
    if "Pedidos Dona Julia | Cliente" in response.text:
        respuesta = 1
    print('Terminando la validación')
    assert respuesta == 1 and response.status_code == 200

#Correlative
def test_status_admin_correlative_index():
    url = main_url + "/correlative/index"
    data = {}
    response = requests.get(url,data=data)
    assert response.status_code == 200

def test_status_admin_correlative_edit():
    url = main_url + "/correlative/edit/2"
    data = {}
    response = requests.get(url,data=data)
    assert response.status_code == 200

#Direction
def test_status_admin_direction_index():
    url = main_url + "/direction/index"
    data = {}
    response = requests.get(url,data=data)
    assert response.status_code == 200

def test_status_admin_direction_edit():
    url = main_url + "/direction/edit/1"
    data = {}
    response = requests.get(url,data=data)
    assert response.status_code == 200

#Invoice
def test_status_admin_invoice_index():
    url = main_url + "/invoice/index"
    data = {}
    response = requests.get(url,data=data)
    assert response.status_code == 200

def test_status_admin_invoice_detail_index():
    url = main_url + "/invoice_detail/index"
    data = {}
    response = requests.get(url,data=data)
    assert response.status_code == 200

#People
def test_status_admin_person_index():
    url = main_url + "/person/index"
    data = {}
    response = requests.get(url,data=data)
    assert response.status_code == 200

#Products
def test_status_admin_product_index():
    url = main_url + "/product/index"
    data = {}
    response = requests.get(url,data=data)
    assert response.status_code == 200

def test_status_admin_product_edit():
    url = main_url + "/product/edit/1"
    data = {}
    response = requests.get(url,data=data)
    assert response.status_code == 200

#Users
def test_status_admin_user_index():
    url = main_url + "/user/index"
    data = {}
    response = requests.get(url,data=data)
    assert response.status_code == 200

def test_status_admin_variable_edit():
    url = main_url + "/variable/edit/2"
    data = {}
    response = requests.get(url,data=data)
    assert response.status_code == 200