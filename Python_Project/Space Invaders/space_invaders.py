# Space invaders

import turtle
import os
import math
import random
import platform

# Untuk pengaturan sound disini
if platform.system() == "Windows":
    try:
        import winsound
    except:
        print("Tidak ada windsound.")

# Set up layar
wn = turtle.Screen()
wn.bgcolor("black")
wn.title("Space Invaders")
wn.bgpic("space_invaders_background.gif")
wn.tracer(0)

# Registrasi bentuk
wn.register_shape("invader.gif")
wn.register_shape("player.gif")

# Membuat border
border_pen = turtle.Turtle()
border_pen.speed(0)
border_pen.color("white")
border_pen.penup()
border_pen.setposition(-300, -300)
border_pen.pendown()
border_pen.pensize(3)
for side in range(4):
    border_pen.fd(600)
    border_pen.lt(90)
border_pen.hideturtle()

# Membuat skor
score = 0 

# Menggambar skor
score_pen = turtle.Turtle()
score_pen.speed(0)
score_pen.color("white")
score_pen.penup()
score_pen.setposition(-290, 280)
scorestring = "Score: {}".format(score)
score_pen.write(scorestring, False, align="left", font=("Arial", 14, "normal"))
score_pen.hideturtle()

# Membuat player
player = turtle.Turtle()
player.color("blue")
player.shape("player.gif")
player.penup()
player.speed(0)
player.setposition(0, -250)
player.setheading(90)
player.speed = 0


# Pilih jumlah musuh
number_of_enemies = 30

# Membuat list kosong untuk musuh
enemies = []

# Menambahkan musuh ke dalam list
for i in range (number_of_enemies):
    # Membuat musuh
    enemies.append(turtle.Turtle())

enemy_start_x = -225
enemy_start_y = 250
enemy_number = 0

for enemy in enemies:
    enemy.color("red")
    enemy.shape("invader.gif")
    enemy.penup()
    enemy.speed(0)
    x = enemy_start_x + (50 * enemy_number)
    y = enemy_start_y
    enemy.setposition(x, y)

    # Update nomor musuh
    enemy_number += 1
    if enemy_number == 10:
        enemy_start_y -= 50
        enemy_number = 0

enemyspeed = 0.02

# Membuat senjata player
bullet = turtle.Turtle()
bullet.color("yellow")
bullet.shape("triangle")
bullet.penup()
bullet.speed(0)
bullet.setheading(90)
bullet.shapesize(0.5, 0.5)
bullet.hideturtle()

bulletspeed = 2

# Membuat state
# Siap untuk  menembak
# Bullet ditembakkan
bulletstate = "ready"

# Menggerakkan pemain ke kiri dan kanan

def move_left():
    player.speed = -0.5


def move_right():
    player.speed = 0.5


def move_player():
    x = player.xcor()
    x += player.speed
    if x < -280:
        x = -280
    if x > 280:
        x = 280
    player.setx(x)

def fire_bullet():
    # Deklarasikan bullet
    global bulletstate
    if bulletstate == "ready":
        play_sound("laser.wav")
        bulletstate = "fire"
        # Gerakkan peluru di atas pemain
        x = player.xcor()
        y = player.ycor() + 10
        bullet.setposition(x, y)
        bullet.showturtle()

def isCollision(t1, t2):
    distance = math.sqrt(math.pow(t1.xcor() - t2.xcor(), 2)+ math.pow(t1.ycor() - t2.ycor(), 2))
    if distance < 15:
        return True
    else:
        return False


def play_sound(sound_file, time = 0):
    # windows
    if platform.system() == "Windows":
        winsound.PlaySound(sound_file, winsound.SND_ASYNC)


# Membuat tombolnya
wn.listen()
wn.onkey(move_left, "Left")
wn.onkey(move_right, "Right")
wn.onkey(fire_bullet, "space")


# Looping program utama
while True:

    wn.update()
    move_player()

    for enemy in enemies:
        # Gerakkan musuhnya
        x = enemy.xcor()
        x += enemyspeed
        enemy.setx(x)

        # Gerakkan musuh mundur dan kebawah
        if enemy.xcor() > 280:
            # Menggerakkan musuh ke bawah
            for e in enemies:
                y = e.ycor()
                y -= 40
                e.sety(y)
            # Mengubah Arah
            enemyspeed *= -1

        if enemy.xcor() < -280:
            # Menggerakkan musuh ke bawah
            for e in enemies:
                e.ycor()
                y -= 40
                e.sety(y)
            # Menugbah arah
            enemyspeed *= -1
    
        # Cek collusion
        if isCollision(bullet, enemy):
            play_sound("explosion.wav")
            # Reset bullet
            bullet.hideturtle()
            bulletstate = "ready"
            bullet.setposition(0, -400)

            # Reset musuh
            enemy.setposition(0, 10000)

            # Update score
            score += 10
            scorestring = "Score: {}".format(score)
            score_pen.clear()
            score_pen.write(scorestring, False, align="left", font=("Arial", 14, "normal"))
        
        if isCollision(player, enemy):
            play_sound("explosion.wav")
            player.hideturtle()
            enemy.hideturtle()
            print ("Game Over")
            break

    # Menggerakkan peluru
    if bulletstate == "fire":
        y = bullet.ycor()
        y += bulletspeed
        bullet.sety(y)

    # Cek peluru sampai ke atas
    if bullet.ycor() > 275:
        bullet.hideturtle()
        bulletstate = "ready"


wn.mainloop()