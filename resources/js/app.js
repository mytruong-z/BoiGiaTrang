import React, { useState } from 'react';
import ReactDOM from 'react-dom';
import 'bootstrap/dist/css/bootstrap.css';
import '../css/default.css';
import '../css/layout.css';
import '../css/media-queries.css';
import '../css/magnific-popup.css';
import resumeDataJs from '../contains/resumeData.json';
import Header from './components/Header';
import Footer from './components/Footer';
import About from './components/About';
import Resume from './components/Resume';
import Contact from './components/Contact';
import Portfolio from './components/Portfolio';

const App = (props) => {
    const [resumeData, setResumeData] = useState(resumeDataJs);

    return (
        <div className="App">
            <Header data={resumeData.main}/>
            <About data={resumeData.main}/>
            <Resume data={resumeData.resume}/>
            <Portfolio data={resumeData.portfolio}/>
            <Contact data={resumeData.main}/>
            <Footer data={resumeData.main}/>
        </div>
    );
};

export default App;

if (document.getElementById('app')) {
    ReactDOM.render(<App/>, document.getElementById('app'));
}

/*import ReactGA from "react-ga";
import $ from "jquery";
import "./App.css";
import Header from "./components/Header";
import Footer from "./components/Footer";
import About from "./components/About";
import Resume from "./components/Resume";
import Contact from "./components/Contact";
import Portfolio from "./components/Portfolio";

class App extends Component {
    constructor(props) {
        super(props);
        this.state = {
            foo: "bar",
            resumeData: {}
        };

        ReactGA.initialize("UA-110570651-1");
        ReactGA.pageview(window.location.pathname);
    }

    getResumeData() {
        $.ajax({
            url: "./resumeData.json",
            dataType: "json",
            cache: false,
            success: function(data) {
                this.setState({ resumeData: data });
            }.bind(this),
            error: function(xhr, status, err) {
                console.log(err);
                alert(err);
            }
        });
    }

    componentDidMount() {
        console.log("hfsdkjfk");
        this.getResumeData();
    }

    render() {
        return (
            <div className="App">
                <Header data={this.state.resumeData.main} />
                <About data={this.state.resumeData.main} />
                <Resume data={this.state.resumeData.resume} />
                <Portfolio data={this.state.resumeData.portfolio} />
                <Contact data={this.state.resumeData.main} />
                <Footer data={this.state.resumeData.main} />
            </div>
        );
    }
}
*/
