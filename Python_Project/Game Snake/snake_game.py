# Membuat sebuah permainan ular dengan menggunakan python

import turtle
import time
import random

delay = 0.1

#Score
score = 0
high_score = 0

#set up layar
wn = turtle.Screen()
wn.title("Game Ular Oleh Muhammad Nazhim Maulana")
wn.bgcolor("black")
wn.setup(width=600, height=600)
wn.tracer(0) # Mematikan update layar

# Membuat kepala ular
head = turtle.Turtle()
head.speed(0)
head.shape("square")
head.color("white")
head.penup()
head.goto(0,0)
head.direction = "stop"

# Makanan ular
food = turtle.Turtle()
food.speed(0)
food.shape("circle")
food.color("green")
food.penup()
food.goto(0,100)

segments = []

# Pen
pen = turtle.Turtle()
pen.speed(0)
pen.shape("square")
pen.color("white")
pen.penup()
pen.hideturtle()
pen.goto(0, 260)
pen.write("Skor: 0 Skor Tertinggi: 0", align="center", font=("Courier", 24, "normal"))

# Functions

def go_up():
    if head.direction != "down":
        head.direction = "up"

def go_down():
    if head.direction != "up":
        head.direction = "down"

def go_left():
    if head.direction != "right":
        head.direction = "left"

def go_right():
    if head.direction != "left":
        head.direction = "right"

def move(): # Untuk arahnya
    if head.direction == "up":
        y = head.ycor()
        head.sety(y + 20)

    if head.direction == "down":
        y = head.ycor()
        head.sety(y - 20)

    if head.direction == "left":
        x = head.xcor()
        head.setx(x - 20)

    if head.direction == "right":
        x = head.xcor()
        head.setx(x + 20)

# Menghubungkan key dengan function

wn.listen()
wn.onkeypress(go_up, "Up")
wn.onkeypress(go_down, "Down")
wn.onkeypress(go_left, "Left")
wn.onkeypress(go_right, "Right")

# loop game utama
while True:
    wn.update()

    #Mengecek sentuhan dengan border
    if head.xcor() > 290 or head.xcor() < -290 or head.ycor() > 290 or head.ycor() < -290:
        time.sleep(1)
        head.goto(0, 0)
        head.direction = "stop"

        # Menyembunyikan segment
        for segment in segments:
            segment.goto(1000, 1000)

        # Membersihkan segment
        segments.clear()

        # Reset Skor
        score = 0

        # Reset Delay
        delay = 0.1

        pen.clear()
        pen.write("Score: {} High Score {}".format(score, high_score), align="center", font=("Courier", 24, "normal"))

    #Mengecek sentuhan makanan
    if head.distance(food) < 20:
        # Memindahkan posisi makanan random
        x = random.randint(-290, 290)
        y = random.randint(-290, 290)
        food.goto(x, y)


        # Menambah segment
        new_segment = turtle.Turtle()
        new_segment.speed(0)
        new_segment.shape("square")
        new_segment.color("grey")
        new_segment.penup()
        segments.append(new_segment)

        # Memendekkan delay
        delay -= 0.0001

        # Menambahkan Skor
        score += 10

        if score > high_score:
            high_score = score

        pen.clear()
        pen.write("Score: {} High Score {}".format(score, high_score), align="center", font=("Courier", 24, "normal"))

    # Menggerakkan segment akhir dulu dalam urutan terbalik
    for index in range(len(segments)-1, 0, -1):
        x = segments[index - 1].xcor()
        y = segments[index - 1].ycor()
        segments[index].goto(x, y)
    
    # Menggerakkan segment 0 ke letak kepala
    if len(segments) > 0:
        x = head.xcor()
        y = head.ycor()
        segments[0].goto(x, y)
    
    move()

    # Mengecek tabrakan antara kepala dan badan
    for segment in segments:
        if segment.distance(head) < 20:
            time.sleep(1)
            head.goto(0, 0)
            head.direction = "stop"

            # Menyembunyikan segment
            for segment in segments:
                segment.goto(1000, 1000)

            # Membersihkan segment
            segments.clear()

            # Reset Skor
            score = 0

            # Reset Delay
            delay = 0.1

            pen.clear()
            pen.write("Score: {} High Score {}".format(score, high_score), align="center", font=("Courier", 24, "normal"))


    time.sleep(delay)

wn.mainloop()