import React from "react";
import "./App.css";
import {
  BrowserRouter as Router,
  Routes,
  Route,
  Outlet,
  useLocation,
} from "react-router-dom";
import Landing from "./pages/Landing";
import Application from "./pages/Form";
import Succesful from "./pages/Succesful";
import Header from "./components/Header";
import { motion } from "framer-motion";
import ScrollToTop from "./components/ScrollToTop";

const PageLayout = ({ children }) => children;

const pageVariants = {
  initial: {
    opacity: 0,
  },
  in: {
    opacity: 1,
  },
  out: {
    opacity: 0,
  },
};
const pageTransition = {
  type: "tween",
  ease: "linear",
  duration: 0.5,
};

const AnimationLayout = () => {
  const { pathname } = useLocation();
  return (
    <PageLayout>
      <motion.div
        key={pathname}
        initial="initial"
        animate="in"
        variants={pageVariants}
        transition={pageTransition}
      >
        <Outlet />
      </motion.div>
    </PageLayout>
  );
};

function App() {
  return (
    <>
      <Header />

      <Router>
        <ScrollToTop />
        <Routes>
          <Route element={<AnimationLayout />}>
            <Route exact path="/" element={<Landing />} />
            <Route exact path="/form" element={<Application />} />
            <Route exact path="/result" element={<Succesful />} />
          </Route>
        </Routes>
      </Router>
    </>
  );
}

export default App;
