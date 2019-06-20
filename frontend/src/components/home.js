// src/components/home.js

import React from 'react'
import Container from 'react-bootstrap/Container';
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col'
import Figure from 'react-bootstrap/Figure'

class Home extends React.Component {
    render() {
        return (
            <Container>
                <h2>HOME</h2>
                <br/>
                <Row>
                    <Col>
                        <Figure class="text-center">
                            <p>This is an application created with ReactJS 4.3.</p>
                            <p>If you go to the 'Clubs' tab you will see a list of teams belonging to LaLiga.</p>
                            <p>Clicking on the shields you can see the list of players of the team selects.</p>
                            <p>If you go directly to the 'Players' tab you will see a list of all players.</p>
                            <p>You can also add a player from the 'Add Player' tab.</p>
                        </Figure>
                    </Col>
                </Row>
            </Container>
        );
    }
}

export default Home;