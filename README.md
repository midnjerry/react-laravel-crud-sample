# react-laravel-crud-sample
This project represents an Admin Panel (written in React) that accesses a Customer CRUD service (written in Laravel PHP).  This project is a sandbox for understanding best practices in design patterns and also in testing.

Laravel does a great job of incorporating ORM and data access in a very intuitive and easy to understand manner.  However,
I have found that it is not easy to distinguish between the Laravel framework and pure PHP.  This is important when it comes to testing.  If a unit test can be executed in pure PHP without having to load the Laravel framework, then in theory those tests will execute faster.  I don't know if this is actually the case so am curious to see how this plays out in an enterprise setting.

I've included the following test examples:
* Full end-to-end test using Laravel framework with in-memory database
* Integration test acting as unit test incorporating Laravel framework and Laravel-based mocking
* Unit test written in pure PHP using PHPUnit

## Endpoints

* `GET api/customers`
* `GET api/customers/{customerId}`
* `POST api/customers`
* `PUT api/customers/{customerId}`
* `PATCH api/customers/{customerId}`
* `DELETE api/customers/{customerId}`

## How To Run

### Frontend

### Backend
1. `cd customer-crud`
2. `composer run dev`
