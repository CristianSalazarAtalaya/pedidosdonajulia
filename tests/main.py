#from unittest import TestCase, result
#from .utils import classes



# class TestResponse(TestCase):
    
#     def test_ok(self):
#         result =

import pytest

@pytest.fixture
def numbers():
    a = 10
    b=20
    c =25
    return[a,b,c]


def test_method(numbers):
    x= 15
    assert numbers[0] == X

def test_method2(numbers):
    y = 20
    assert numbers[1] == y

def test_method2(numbers):
    z = 25
    assert numbers[2] == z