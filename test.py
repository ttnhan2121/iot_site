import paho.mqtt.client as mqtt
import mysql.connector
import jsons
from mysql.connector import Error

try:
    mydb = mysql.connector.connect(
        host="207.148.89.235",
        user="root",
        password="doesnotmatter",
        database="iot_server",
        port=3306
    )
    if mydb.is_connected():
        print("Successfully connected to the database")
except Error as e:
    print(f"Error: {e}")

def insert(table, value):
    try:
        if mydb.is_connected():
            mycursor = mydb.cursor()

            sql = "INSERT INTO " + table + "(" + table + "_value) VALUES (%s)"
            val = (value,)

            mycursor.execute(sql, val)
            mydb.commit()

            print(mycursor.rowcount, "record inserted into", table)
        else:
            print("Database connection is not active.")
    except Error as e:
        print(f"Error: {e}")
    finally:
        if 'mycursor' in locals():
            mycursor.close()

def insert_light(key, value):
    try:
        if mydb.is_connected():
            mycursor = mydb.cursor()

            sql = "INSERT INTO light (id_light, light_state) VALUES (%s, %s)"
            val = (key, value)

            mycursor.execute(sql, val)
            mydb.commit()

            print(mycursor.rowcount, "record inserted into light")
        else:
            print("Database connection is not active.")
    except Error as e:
        print(f"Error: {e}")
    finally:
        if 'mycursor' in locals():
            mycursor.close()


def on_connect(client, userdata, flags, rc):
    print("Connected with result code "+str(rc))
    client.subscribe("temp")
    client.subscribe("humi")
    client.subscribe("device/lightsState")

def on_message(client, userdata, msg):
    print(msg.topic + " " + str(msg.payload))
    try:
        payload = float(msg.payload.decode("utf-8"))
        if msg.topic == "temp":
            insert("temp", payload)
        if msg.topic == "humi":
            insert("humi", payload)
        if msg.topic == "device/lightsState":
            payload_str = msg.payload.decode("utf-8")
            payload_dict = jsons.loads(payload_str)
            light0_value = payload_dict.get('light0')
            light1_value = payload_dict.get('light1')
            light2_value = payload_dict.get('light2')
            light3_value = payload_dict.get('light3')
            if light0_value == 1:
                insert_light('light0', light0_value)
            if light1_value == 1:
                insert_light('light1', light1_value)
            if light2_value == 1:
                insert_light('light2', light2_value)
            if light3_value == 1:
                insert_light('light3', light3_value)
        
    except Exception as e:
        print(f"Error processing message: {e}")

client = mqtt.Client()
client.on_connect = on_connect
client.on_message = on_message

client.connect("broker.emqx.io", 1883, 60)

client.loop_forever()

