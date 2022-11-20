import plotly.graph_objects as go
import plotly.offline as pyo
import matplotlib.pyplot as plt
import mysql.connector
from mysql.connector import Error


def execute_query_get(connection, query):

    cursor = connection.cursor(buffered=True)
    try:
        info = cursor.execute(query)
        connection.commit()
        return cursor.fetchall()
    except Error as err:
        print(f"Error: '{err}'")


def create_server_connection(host_name, user_name, user_password):
    connection = None
    try:
        connection = mysql.connector.connect(
            host=host_name,
            user=user_name,
            passwd=user_password,
            database="gotta_hack"
        )
        print("MySQL Database connection successful")
    except Error as err:
        print(f"Error: '{err}'")

    return connection


def execute_query_post(connection, query):
    cursor = connection.cursor(buffered=True)
    try:
        info = cursor.execute(query)
        connection.commit()
        # print("Query successful")
    except Error as err:
        print(f"Error: '{err}'")


Connectio = create_server_connection("localhost", "root", "")


for i in range(3, 20):
    req = "INSERT INTO `tab_donneur`(`id_donneur`, `photo_profil`, `age`, `sexual_orientation`, `origine`, `height`, `color_eyes`, `hair_color`, `hairiness`, `sport_week`, `leadership`, `humor`, `manual`, `literary`, `analytical_thinking`, `wittiness`, `donor_word`, `center_interest_3`, `center_interest_1`, `center_interest_2`) VALUES (NULL,'asset\images\graphe_picture\giver\graphe_giver_1.png',25,'Hetero','France',180,'Blue','Blond','Low',3,59,100,85,48,100,15,'Thanks you all teams!!!','Piscine','Football','Tennis')"
