# CodeIgniter 4 Application Starter

## Content

- [Summary](#summary)
- [Installation and Updates](#installation-and-updates)
- [Setup](#setup)
- [Create Databse](#create-databse)
- [How to Run](#how-to-run)
- [How to Access](#how-to-access)
- [How to Use](#how-to-use)
- [In addition](#in-addition)

## Summary

Used CodeIgniter4 \
Now you can follow this doc

[here](https://codeigniter4.github.io/userguide/)

## Installation and Updates

- `composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework

- When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Create Databse

You should create MySQL Database on your server(i.e. Xampp) \
You can see the name of the Database in .env file
- Migrate Database \
  `php spark migrate`

## How to Run

- You can run the server using the command \
  `php spark serve`

## How to Access

Then access using the address - http://localhost:8080

## How to Use

You can see 3 sections on the browser
- First : section for HighLight Test
- Second : section for upload and display the list of uploaded files
- Third : section for PDF Viewer

## In addition
Uploaded files will be saved in \Public\uploads
