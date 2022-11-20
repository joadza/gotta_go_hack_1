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


def del_giver(id):
    pop = "DELETE FROM tab_graphe_giver WHERE id = " + str(id)+""
    execute_query_post(Connection, pop)


def give_pdf(tab):

    categories = ['literary', 'manual,leadership',
                  'Humor', 'analytical thinking', 'wittines']
    categories = [*categories, categories[0]]

    data1 = [tab[2], tab[3], tab[4], tab[5], tab[6]]

    data1 = [*data1, data1[0]]

    fig = go.Figure(
        data=[
            go.Scatterpolar(r=data1, theta=categories,
                            fill='toself', name='data1 1'),

        ],
        layout=go.Layout(
            title=go.layout.Title(text='character traits'),
            polar={'radialaxis': {'visible': False}},
            showlegend=True
        )
    )

    fig.write_image(
        "asset/images/graphe_picture/giver/graphe_giver_"+str(tab[1])+".png")
    query = "UPDATE tab_donneur SET photo_araigne = 'asset/images/graphe_picture/giver/graphe_giver_" + \
        str(tab[1])+".png' WHERE id_donneur = " + str(tab[1])+""
    execute_query_post(Connection, query)
    del_giver(tab[0])


Connection = create_server_connection("localhost", "root", "")
pop = "SELECT * FROM tab_graphe_giver LIMIT 1"
while(1):

    res = execute_query_get(Connection, pop)
    if(res):
        print(res[0])
        give_pdf(res[0])


# pyo.plot(fig, filename='graphe.html')
