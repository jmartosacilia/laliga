// src/components/players.js

import React from 'react'
import Container from 'react-bootstrap/Container';
import Row from 'react-bootstrap/Row'
import Col from 'react-bootstrap/Col'
import Figure from 'react-bootstrap/Figure'
import queryString from 'query-string'

class Players extends React.Component {
    state = {
        players: []
    };
    render() {
        console.log(this);
        return (
            <Container className="text-center">
                <h1>Players</h1>
                <Row>
                    {this.state.players.map((player) => (
                        <Col xs={4}>
                            <Figure class="text-center" style={{
                            }}>
                                <Figure.Image
                                    width={120}
                                    height={120}
                                    alt="120x120"
                                    src={"http://laliga-api.loc/images/soccer-t-shirt.png"}
                                />
                                <Figure.Caption class="centered">
                                    <p>{player['dorsal']}</p>
                                </Figure.Caption>
                                <Figure.Caption class="text-center">
                                    <p>{player['name']}</p>
                                </Figure.Caption>
                            </Figure>
                        </Col>
                    ))}
                </Row>
            </Container>)
    }
    componentDidMount() {
        const value = queryString.parse(this.props.location.search);
        const club = value.club;
        const uri = 'http://laliga-api.loc/api/v1/clubs/' + club + '/players';
        fetch(uri)
            .then(res => res.json())
            .then((data) => {
                console.log(data);
                this.setState({ players: data })
            })
            .catch(console.log);
    }
}
export default Players