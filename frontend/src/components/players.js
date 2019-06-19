// src/components/players.js

import React from 'react'
import Container from 'react-bootstrap/Container';
import Row from 'react-bootstrap/Row'
import Col from 'react-bootstrap/Col'
import Figure from 'react-bootstrap/Figure'

class Players extends React.Component {
    state = {
        players: []
    };
    render() {
        console.log(this);
        return (
            <Container className="text-center">
                <h1>Player</h1>
                <Row>
                    {this.state.players.map((player) => (
                        <Col xs={4}>
                            <Figure class="text-center" style={{
                                border: '1px solid gray'
                            }}>
                                <Figure.Image
                                    width={120}
                                    height={120}
                                    alt="120x120"
                                    src={"http://laliga-api.loc/" + player['shield']}
                                />
                                <Figure.Caption class="text-center">
                                    <h4>{player['name']}</h4>
                                </Figure.Caption>
                            </Figure>
                        </Col>
                    ))}
                </Row>
            </Container>)
    }
    componentDidMount() {
        const uri = 'http://laliga-api.loc/api/v1/clubs/' + this.props.match.params['id'] + '/players';
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