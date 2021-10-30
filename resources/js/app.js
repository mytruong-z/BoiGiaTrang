import React, { useState } from 'react';
import ReactDOM from 'react-dom';
import 'bootstrap/dist/css/bootstrap.css';
import '../css/default.css';
import '../css/layout.css';
import '../css/media-queries.css';
import '../css/magnific-popup.css';
import '../js/bootstrap.js';
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