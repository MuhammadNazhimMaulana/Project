# Generated by Django 3.1.7 on 2021-05-01 02:48

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('store', '0001_initial'),
    ]

    operations = [
        migrations.AddField(
            model_name='product',
            name='image',
            field=models.IntegerField(blank=True, null=True),
        ),
    ]
