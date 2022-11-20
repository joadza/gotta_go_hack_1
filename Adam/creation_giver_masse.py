import plotly.graph_objects as go
import plotly.offline as pyo
import matplotlib.pyplot as plt
import mysql.connector
from mysql.connector import Error
import random


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
    execute_query_post(Connectio, pop)


def give_pdf(tab):

    categories = ['Humor', 'literary', 'manual,leadership',
                  'analytical thinking', 'wittines']
    categories = [*categories, categories[0]]

    data1 = [tab[0], tab[1], tab[2], tab[3], tab[4]]

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

    fig.write_image("graphe_giver_"+str(tab[1])+".png")
    query = "UPDATE tab_donneur SET photo_profil = 'asset/images/graphe_picture/giver/graphe_giver_" + \
        str(res[1])+".png WHERE id_donneur = " + str(res[1])+""
    execute_query_post(Connection, query)
    del_giver(tab[0])


Connectio = create_server_connection("localhost", "root", "")


for i in range(0, 30):

    origin = ['France', 'Germany', 'Italy', 'Spain', 'United Kingdom', 'United States', 'Canada', 'Australia', 'New Zealand',
              'Japan', 'China', 'India', 'Brazil', 'Mexico', 'Argentina', 'South Africa', 'Nigeria', 'Egypt', 'Russia', 'Turkey']
    eyes_color = ['Blue', 'Brown', 'Green',
                  'Hazel', 'Grey', 'Amber', 'Violet']
    different_value = ['Low', 'Medium', 'High']
    sport = ['Football', 'Basketball', 'Tennis', 'Volleyball',
             'Baseball', 'Hockey', 'Rugby', 'Golf', 'Cricket', 'Boxing',
             'Wrestling', 'Swimming', 'Diving', 'Skiing', 'Cycling', 'Running',
             'Gymnastics', 'Archery', 'Fencing', 'Dancing', 'Soccer', 'Horse riding',
             'Surfing', 'Skateboarding', 'Snowboarding', 'Skiing', 'Climbing',
             'Fishing', 'Hunting', 'Golf', 'Bowling', 'Billiards', 'Darts',
             'Table tennis', 'Badminton', 'Chess', 'Poker', 'Pool', 'Racquetball',
             'Squash', 'Tennis', 'Volleyball', 'American football', 'Baseball',
             'Basketball', 'Cricket', 'Field hockey', 'Ice hockey', 'Lacrosse',
             'Rugby', 'Softball', 'Handball', 'Water polo', 'Boxing', 'Wrestling',
             'Judo', 'Taekwondo', 'Karate', 'Gymnastics', 'Diving', 'Swimming']
    text_of_thanks = 'I am very grateful for your help, I will never forget it i will always remember you my son is now your son, i gonna be grattful for youAnd i Hope you gonna be fine'
    req = "INSERT INTO `tab_donneur`(`id_donneur`, `photo_profil`, `age`, `sexual_orientation`, `origine`, `height`, `color_eyes`, `hair_color`, `hairiness`, `sport_week`, `leadership`, `humor`, `manual`, `literary`, `analytical_thinking`, `wittiness`, `donor_word`, `center_interest_3`, `center_interest_1`, `center_interest_2`) VALUES (NULL,NULL,'"+str(
        random.randint(37, 54))+"','Hetero','"+str(origin[random.randint(0, len(origin)-1)])+"','"+str(random.randint(165, 189))+"','"+str(eyes_color[random.randint(0, len(eyes_color)-1)]) + "','Blond','"+str(different_value[random.randint(0, len(different_value)-1)])+"','"+str(random.randint(0, 6)) + "','"+str(random.randint(23, 100))+"','"+str(random.randint(23, 100))+"','"+str(random.randint(23, 100))+"','"+str(random.randint(23, 100))+"','"+str(random.randint(23, 100))+"','"+str(random.randint(23, 100))+"','"+text_of_thanks+"','"+sport[random.randint(0, len(sport)-1)]+"','"+sport[random.randint(0, len(sport)-1)]+"','"+sport[random.randint(0, len(sport)-1)]+"')"
    print(req)
    execute_query_post(Connectio, req)
    res = execute_query_get(
        Connectio, "SELECT id_donneur FROM `tab_donneur` WHERE 1 ORDER BY id_donneur DESC LIMIT 1")
    id_donneur = res[0][0]
    res = query = "UPDATE tab_donneur SET photo_profil = 'asset/images/graphe_picture/giver/graphe_giver_" + \
        str(id_donneur)+".png' WHERE id_donneur = " + str(id_donneur)+""
    print(res)
    execute_query_post(Connectio, query)
