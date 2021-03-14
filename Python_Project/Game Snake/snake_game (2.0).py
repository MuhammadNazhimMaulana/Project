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
head.goto(-100,0)
head.direction = "stop"

# Membuat kepala ular (dua)
head2 = turtle.Turtle()
head2.speed(0)
head2.shape("square")
head2.color("blue")
head2.penup()
head2.goto(100,0)
head2.direction = "stop"

# Makanan ular
food = turtle.Turtle()
food.speed(0)
food.shape("circle")
food.color("green")
food.penup()
food.goto(0,100)

segments = []
segments2 = []

# Pen
pen = turtle.Turtle()
pen.speed(0)
pen.shape("square")
pen.color("white")
pen.penup()
pen.hideturtle()
pen.goto(0, 260)
pen.write("Score Player 1: 0 Score Tertinggi Player 1: 0", align="center", font=("Courier", 15, "normal"))

# Pen
pen2 = turtle.Turtle()
pen2.speed(0)
pen2.shape("square")
pen2.color("white")
pen2.penup()
pen2.hideturtle()
pen2.goto(0, 240)
pen2.write("Score Player 2: 0 Score Tertinggi Player 2: 0", align="center", font=("Courier", 15, "normal"))

# Functions
# Untuk kepala yang original
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

# Ini untuk kepala yang kedua
def go_up2():
    if head2.direction != "down":
        head2.direction = "up"

def go_down2():
    if head2.direction != "up":
        head2.direction = "down"

def go_left2():
    if head2.direction != "right":
        head2.direction = "left"

def go_right2():
    if head2.direction != "left":
        head2.direction = "right"

def move2(): # Untuk arahnya
    if head2.direction == "up":
        y = head2.ycor()
        head2.sety(y + 20)

    if head2.direction == "down":
        y = head2.ycor()
        head2.sety(y - 20)

    if head2.direction == "left":
        x = head2.xcor()
        head2.setx(x - 20)

    if head2.direction == "right":
        x = head2.xcor()
        head2.setx(x + 20)

# Menghubungkan key dengan function

wn.listen()
# Untuk menggerakkan kepala yang pertama
wn.onkeypress(go_up, "Up")
wn.onkeypress(go_down, "Down")
wn.onkeypress(go_left, "Left")
wn.onkeypress(go_right, "Right")

# Untuk menggerakkan kepala yang kedua
wn.onkeypress(go_up2, "w")
wn.onkeypress(go_down2, "a")
wn.onkeypress(go_left2, "s")
wn.onkeypress(go_right2, "d")

# loop game utama
while True:
    wn.update()

    #Mengecek sentuhan dengan border
    if head.xcor() > 290 or head.xcor() < -290 or head.ycor() > 290 or head.ycor() < -290:
        time.sleep(1)
        head.goto(-100, 0)
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
        pen.write("Score Player 1: {} High Score Player 1: {}".format(score, high_score), align="center", font=("Courier", 15, "normal"))


    #Mengecek sentuhan dengan border ini sendiri untuk player yang kedua
    if head2.xcor() > 290 or head2.xcor() < -290 or head2.ycor() > 290 or head2.ycor() < -290:
        time.sleep(1)
        head2.goto(100, 0)
        head2.direction = "stop"

        # Menyembunyikan segment
        for segment2 in segments2:
            segment2.goto(1000, 1000)

        # Membersihkan segment
        segments2.clear()

        # Reset Skor
        score = 0

        # Reset Delay
        delay = 0.1

        pen2.clear()
        pen2.write("Score Player 2: {} High Score Player 2: {}".format(score, high_score), align="center", font=("Courier", 15, "normal"))
    
    # Mengecek sentuhan makanan
    if head.distance(food) < 20:
        # Memindahkan posisi makanan random
        x = random.randrange(-280, 280, 20)
        y = random.randrange(-280, 280, 20)
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
        pen.write("Score Palyer 1: {} High Score Player 1: {}".format(score, high_score), align="center", font=("Courier", 15, "normal"))


    # Mengecek sentuhan makanan Kali ini juga untuk player yang kedua
    if head2.distance(food) < 20:
        # Memindahkan posisi makanan random
        x = random.randrange(-280, 280, 20)
        y = random.randrange(-280, 280, 20)
        food.goto(x, y)


        # Menambah segment
        new_segment = turtle.Turtle()
        new_segment.speed(0)
        new_segment.shape("square")
        new_segment.color("grey")
        new_segment.penup()
        segments2.append(new_segment)

        # Memendekkan delay
        delay -= 0.0001

        # Menambahkan Skor
        score += 10

        if score > high_score:
            high_score = score

        pen2.clear()
        pen2.write("Score Player 2: {} High Score Player 2: {}".format(score, high_score), align="center", font=("Courier", 15, "normal"))
  
    # Menggerakkan segment akhir dulu dalam urutan terbalik
    for index in range(len(segments)-1, 0, -1):
        x = segments[index - 1].xcor()
        y = segments[index - 1].ycor()
        segments[index].goto(x, y)

    # Menggerakkan segment akhir dulu dalam urutan terbalik (Untuk player dua)
    for index in range(len(segments2)-1, 0, -1):
        x = segments2[index - 1].xcor()
        y = segments2[index - 1].ycor()
        segments2[index].goto(x, y)
    
    # Menggerakkan segment 0 ke letak kepala
    if len(segments) > 0:
        x = head.xcor()
        y = head.ycor()
        segments[0].goto(x, y)

    # Menggerakkan segment 0 ke letak kepala kedua
    if len(segments2) > 0:
        x = head2.xcor()
        y = head2.ycor()
        segments2[0].goto(x, y)
    
    move()
    move2()

    # Mengecek tabrakan antara kepala dan badan
    for segment in segments:
        if segment.distance(head) < 20:
            time.sleep(1)
            head.goto(-100, 0)
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
            pen.write("Score Player 1: {} High Score Player 1: {}".format(score, high_score), align="center", font=("Courier", 15, "normal"))

    # Mengecek tabrakan antara kepala dan badan untuk ular yang kedua
    for segment2 in segments2:
        if segment2.distance(head2) < 20:
            time.sleep(1)
            head2.goto(100, 0)
            head2.direction = "stop"

            # Menyembunyikan segment
            for segment2 in segments2:
                segment2.goto(1000, 1000)

            # Membersihkan segment
            segments2.clear()

            # Reset Skor
            score = 0

            # Reset Delay
            delay = 0.1

            pen2.clear()
            pen2.write("Score Player 2: {} High Score Player 2: {}".format(score, high_score), align="center", font=("Courier", 15, "normal"))


    time.sleep(delay)

wn.mainloop()