import serial
import mysql.connector

# Configura la conexión con la base de datos
mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="1234",
  database="paginaweb"
)

# Configura la conexión serial
ser = serial.Serial('COM5', 9600)  # Asegúrate de elegir el puerto serial correcto

while True:
    if ser.in_waiting > 0:
        line = ser.readline().decode('utf-8').rstrip()
        print(line)

        # Divide la línea en partes
        parts = line.split(',')

        # Si no hay suficientes partes, imprime un mensaje de error y continua con la siguiente iteración del bucle
        if len(parts) < 6:
            print(f'Error: se esperaban 6 partes, pero se obtuvieron {len(parts)}')
            print('Linea recibida:', line)
            continue

        # Prepara los datos para insertarlos en la base de datos
        data = {
            'id': parts[0],
            'cerradura': parts[1],
            'estatus': parts[2],
            'lugar': parts[3],
            'fecha': parts[4],
            'hora': parts[5]
        }

        # Inserta los datos en la base de datos
        mycursor = mydb.cursor()
        sql = "INSERT INTO cerradura (id, cerradura, estatus, lugar, fecha, hora) VALUES (%s, %s, %s, %s, %s, %s)"
        val = (data['id'], data['cerradura'], data['estatus'], data['lugar'], data['fecha'], data['hora'])
        mycursor.execute(sql, val)
        mydb.commit()
