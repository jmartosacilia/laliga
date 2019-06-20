// src/components/players.js

import React from 'react'
import Container from 'react-bootstrap/Container';
import Form from 'react-bootstrap/Form'
import Button from 'react-bootstrap/Button'
import queryString from 'query-string';

class AddPlayers extends React.Component {
    constructor() {
        super();
        this.addPlayer = this.addPlayer.bind(this);
    }
    state = {
        clubs: []
    };
    render() {
        return (
            <Container>
                <h2>ADD PLAYER</h2>
                <br/>
                <Form onSubmit={this.addPlayer} method="post">
                    <Form.Group controlId="name">
                        <Form.Label>Player name</Form.Label>
                        <Form.Control type="text" placeholder="Enter name" name="name" />
                    </Form.Group>
                    <Form.Group controlId="club">
                        <Form.Label>Player club</Form.Label>
                        <Form.Control as="select" name="club">
                            {this.state.clubs.map((club, index) => (
                            <option value={club['id']}>{club['name']}</option>
                            ))}
                        </Form.Control>
                    </Form.Group>
                    <Form.Group controlId="dorsal">
                        <Form.Label>Player dorsal</Form.Label>
                        <Form.Control placeholder="99" as="input" type="number" name="dorsal" />
                    </Form.Group>
                    <Button type="submit">Add</Button>
                </Form>
            </Container>)
    }
    componentDidMount() {
        fetch('http://laliga-api.loc/api/v1/clubs')
            .then(res => res.json())
            .then((data) => {
                console.log(data);
                this.setState({ clubs: data })
            })
            .catch(console.log);
    }

    addPlayer(event) {
        event.preventDefault();
        const data = new FormData(event.target);
        let name = data.get('name');
        let club = data.get('club');
        let dorsal = data.get('dorsal');

        const uri = 'http://laliga-api.loc/app_dev.php/api/v1/clubs/' + club + '/players';

        fetch(uri, {
            method: 'post',
            body: queryString.stringify({dorsal: dorsal, name: name}),
            headers: {
                "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8"
            },
            success: {

            },
            error: {

            }
        });
    }
}

export default AddPlayers;