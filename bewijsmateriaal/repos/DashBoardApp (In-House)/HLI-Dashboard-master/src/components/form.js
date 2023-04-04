import axios from "axios";
import React, { useState, useEffect } from "react";
import "./formcss.css";
import giffyLoad from "../assets/loading-gif.gif";

const App = ({ response, data }) => {
  const [activeUsers, setActiveUsers] = useState(0);
  const [name, setName] = useState("");
  const [loading, setLoading] = React.useState(true);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const res = await axios.get(
          `https://www.googleapis.com/analytics/v3/data/realtime?ids=ga:${data.id}&metrics=rt:activeUsers&access_token=${response}`,
          {
            headers: {
              authorization: `Bearer ${response}`,
            },
          }
        );

        setActiveUsers(res.data.rows[0][0] || 0);
        setName(data.name);
        setLoading(false);
      } catch (err) {
        console.error(err);
      }
    };

    fetchData();
  }, [data, response]);

  return (
    <div className="form">
      {loading ? (
        <div id="sunDiv">
          <img id="loading" src={giffyLoad} alt="" />
        </div>
      ) : (
        <div id="results">
          <p>{name}</p>
          <p id="total">{activeUsers}</p>
        </div>
      )}
    </div>
  );
};

export default App;
