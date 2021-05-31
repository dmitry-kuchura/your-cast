import React from 'react'
import {connect} from 'react-redux'

class Main extends React.Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <>
                <div className="form-membership">
                    {this.props.children}
                </div>
            </>
        );
    }
}

const mapStateToProps = (state) => {
    return {
        isAuthenticated: state.Auth.isAuthenticated
    }
};

export default connect(mapStateToProps)(Main);
