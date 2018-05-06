
<h1 align="center">
  <br>
  <a href="http://www.adriangonzalezbarbosa.eu/PDP"><img src="https://raw.githubusercontent.com/agonbar/PDP/master/lamorisse.png" alt="Lamorisse Logo" width="200"></a>
  <br>
  Lamorisse
  <br>
</h1>

<p align="center">
  <a href="#install">Install</a> •
  <a href="#roadmap">Roadmap</a> • 
  <a href="#documentation">Documentation</a> •
  <a href="#license">License</a> •
  <a href="#contact-information">Contact Information</a>
</p>

**Lamorisse** is a risk management, web based software, tailored to the needs of the current market. It can be run on a local environment or open to the internet, as needed. Stop those long e-mail chains between your consultants, keep everything on one place and stop worrying.

## Install
With Docker
```bash
# Clone this repository
$ docker run agonbar/PDP
```
Normal installation (not recommended)
```bash
# Clone this repository
$ git clone https://github.com/agonbar/PDP

# Go into the repository
$ cd PDP

# Copy contents from the PHP
$ cp project/* /var/www/html

# Load de Database
$ mysql -u iu -pui < db.dump
```

## Roadmap

### Analysis (ETA 04/05/18)

[@agonbar](https://github.com/agonbar) Will be in charge of the design of:
- [Domain model.](https://raw.githubusercontent.com/agonbar/PDP/master/docs/DomainModel.png)
- [Sequence Diagrams.](https://raw.githubusercontent.com/agonbar/PDP/master/docs/Sequence.png)

[@srfernandez](https://github.com/srfernandez) Will be in charge of:
- [Use Case Model.](https://raw.githubusercontent.com/agonbar/PDP/master/docs/Use%20Case%20model.jpg)
- [Detailed description of Use Case Models.](https://github.com/agonbar/PDP/blob/master/docs/Use%20case%20model%20definition.doc?raw=true)
- [E-R Diagrams.](https://raw.githubusercontent.com/agonbar/PDP/master/docs/ER.png)

### Analysis (ETA  11/05/18)

[@agonbar](https://github.com/agonbar) Will be in charge of:
- Tests with CakePHP bootstrapping.
- Any fix necessary over the last weeks progress requested by the client on the weekly meeting.

[@srfernandez](https://github.com/srfernandez) Will be in charge of:
- Construction of the Mysql Database.
- Design of the interface.
- Any fix necessary over the last weeks progress requested by the client on the weekly meeting.

### Models + Controllers (ETA 18/05/18)

[@agonbar](https://github.com/agonbar) Will be in charge of:
- Añadir código faltante a las clases generadas por CakePHP.
- Any fix necessary over the last weeks progress requested by the client on the weekly meeting.

[@srfernandez](https://github.com/srfernandez) Will be in charge of: 
- Añadir código faltante a las clases generadas por CakePHP.
- Any fix necessary over the last weeks progress requested by the client on the weekly meeting.

### Views (ETA 24/05/18)

[@agonbar](https://github.com/agonbar) Will be in charge of:
- CSS Code general style.
- Any fix necessary over the last weeks progress requested by the client on the weekly meeting.

[@srfernandez](https://github.com/srfernandez) Will be in charge of:
- CSS Code specific pages styles.
- Any fix necessary over the last weeks progress requested by the client on the weekly meeting.

### UX (ETA 01/06/18)

[@agonbar](https://github.com/agonbar) Will be in charge of:
- Any necessary Javascript/CSS code to improve UX.
- Any fix necessary over the last weeks progress requested by the client on the weekly meeting.

[@srfernandez](https://github.com/srfernandez) Will be in charge of:
- Any necessary Javascript/CSS code to improve UX.
- Any fix necessary over the last weeks progress requested by the client on the weekly meeting.

### Cleanup & Testing (ETA 8/06/18)

[@agonbar](https://github.com/agonbar) Will be in charge of:
- Tests.
- Corrections.
- Any fix necessary over the last weeks progress requested by the client on the weekly meeting.

[@srfernandez](https://github.com/srfernandez) Will be in charge of:
- Tests.
- Corrections.
- Any fix necessary over the last weeks progress requested by the client on the weekly meeting.

### Deploy & Testing (ETA 15/06/18)

[@agonbar](https://github.com/agonbar) Will be in charge of:
- Deploy tests.
- Any necessary fixes.
- Any fix necessary over the last weeks progress requested by the client on the weekly meeting.

[@srfernandez](https://github.com/srfernandez) Will be in charge of:
- Deploy tests.
- Any necessary fixes.
- Any fix necessary over the last weeks progress requested by the client on the weekly meeting.

### Fixing & Testing (ETA 22/06/18)

[@agonbar](https://github.com/agonbar) Will be in charge of:
- Fixing errors.
- Last changes on website.
- Any fix necessary over the last weeks progress requested by the client on the weekly meeting.

[@srfernandez](https://github.com/srfernandez) Will be in charge of
- Fixing errors.
- Last changes on website.
- Any fix necessary over the last weeks progress requested by the client on the weekly meeting.

## Documentation

- E-R
- Use Case Model
- Domain Model
- Sequence Model

## License

MIT

## Contact Information
> GitHub [@agonbar](https://github.com/agonbar) &nbsp;&middot;&nbsp;
Telegram [@agonbar](https://t.me/agonbar) &nbsp;&middot;&nbsp;
[adriangonzalezbarbosa.eu](https://www.adriangonzalezbarbosa.eu) &nbsp;&middot;&nbsp; Email [adrian.gonzalez.barbosa@gmail.com](mailto:adrian.gonzalez.barbosa@gmail.com)

> GitHub [@srfernandez](https://github.com/srfernandez) &nbsp;&middot;&nbsp; Email [srfernandez93@gmail.com](mailto:srfernandez93@gmail.com)
