


class Utilidades():
    def validate_route(self,textweb,columnas):
            print('*****SETUP*****')
            list_columns = columnas
            num_elementos = len(list_columns)
            contador=0
            for x in list_columns:
                print('buscar' + x)
                if x in textweb:
                    print('true')
                    contador = contador + 1
                else:
                    print('false')


