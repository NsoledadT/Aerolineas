#Trabajo Práctico Final

Integrantes:
------------
**Scalzotto Marcos** / 
**Barbieri Andrés** / 
**Neri Paula** / 
**Tocci Natalia**


Consigna
========

**Una linea aérea regional esta implementando un sistema de reservas, venta de pasajes y check-in en línea y
hemos ganado la licitación para realizarlo. La empresa esta radicada en Buenos Aires, pero vuela a todas 
las capitales de provincia la república argentina más algunas ciudades importantes más, para algunas de 
ellas hay una sola frecuencia diaria en otras la frecuencia es mayor. Para realizar los vuelos la compañía
cuenta con una flota de 24 aviones de 4 tipos, los cuales realizan mas de un vuelos diario. 
En casi todos los aviones hay 2 categorías, Primera y Economy, las distribución de asientos 
para una u otra categoría depende del destino y del avión:

<table border="1" cellpadding="10"  width="500px" >
  <tr>
     <th>Tipo de Avion</th>
     <th>Pax</th>
     <th>Primera</th>
     <th>Economy</th>
  </tr>
   <tr>
     <td>Tipo 1</td>
     <td>25</td>
     <td>0</td>
     <td>25</td>
  </tr>
    <tr>
     <td>Tipo 2</td>
     <td>80</td>
     <td>10</td>
     <td>70</td>
  </tr>
    <tr>
     <td>Tipo 3</td>
     <td>125</td>
     <td>20</td>
     <td>105</td>
  </tr>
    <tr>
     <td>Tipo 4</td>
     <td>150</td>
     <td>30</td>
     <td>120</td>
  </tr>
</table>

<p><b>El sistema a desarrollar debe realizar los tres pasos principales de la transacción:
 1 – Reservar el pasaje, 2 – Vender el Pasaje y 3 – Realizar el Check-in con asignación de asiento.</b><p>

1.Para la reserva el pasajero debe dar todos los datos personales requeridos (nombre, dni, fecnac, email)
 y se le reserva asiento en la categoría seleccionada al destino requerido, siempre que exista lugar. 
 Si no hay lugar, quedan en lista de espera los primeros 10 excedentes. La reserva debe posibilitar 
 la selección de viaje redondo, esto es ida y vuelta. Para la reserva se le debe entregar al usuario
 un código univoco de reserva.
2. Una vez realizada la reserva el pasajero, con el código de la misma, puede proceder a emitir el
 pasaje electrónico, para ello debe realizar el pago (en esta etapa simulado). En el pasaje deben 
 figurar todos los elementos identificatorios del viaje y debe ser descargable mediante un archivo PDF.
3.48 hs. antes del vuelo y hasta 2 horas previas al despegue, el pasajero, habiendo pagado su pasaje, 
con el código de reserva puede realizar el check-in en el cual selecciona gráficamente el asiento, 
y confirma el pasaje a partir del cual se emite un boarding-pass con un código QR que contenga 
la información del pasaje y el código de reserva. El boarding-pass debe ser impreso o descargado mediante
 un documento PDF.

4.A las 24 Horas de partir el vuelo, la compañía realiza un chequeo de espacio vendido, si las reservas
 no han sido confirmadas, se informa a los pasajeros en lista de espera y se los habilita para realizar
 la compra del pasaje y el check-in. Siempre respetando el orden de llegada y para las cantidades 
 máximas de pasajes a vender.

5.Semanalmente la compañía emite informes de gestión que contengan la siguiente información:

Cantidad de pasajes vendidos
Cantidad de pasajes vendidos por categoría y por destino
Ocupación por avión y destino
Cantidad de reservas caídas

6.La misma debe ser observada en gráficos estadísticos e impresas nominalmente.

