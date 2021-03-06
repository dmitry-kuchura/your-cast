import React from 'react';
import {Link} from 'react-router-dom';

class Breadcrumbs extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            breadcrumbs: [],
        };
    }

    componentDidUpdate(prevProps) {
        if (prevProps.breadcrumbs !== this.props.breadcrumbs) {
            this.setState({breadcrumbs: this.props.breadcrumbs})
        }
    }

    render() {
        if (!this.state.breadcrumbs.length) {
            return null;
        }

        return (
            <>
                <nav aria-label="breadcrumb">
                    <ol className="breadcrumb">
                        <List list={this.state.breadcrumbs}/>
                    </ol>
                </nav>
            </>
        );
    }
}

const List = (props) => {
    let list = props.list;
    let html;

    if (list.length > 0) {
        html = list.map(function (item) {
            return (
                <li className="breadcrumb-item" key={item.name}>
                    <Link className="text-muted" to={item.link}>{item.name}</Link>
                </li>
            )
        });

        return html;
    }

    return null;
};

export default (Breadcrumbs);
