import React, { useEffect, useState } from "react";
import Slider from "react-slick";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import image1 from "../images/carousel/1.png";
import image2 from "../images/carousel/2.png";
import image3 from "../images/carousel/3.png";
import "../styles/ProcessView.css";

const images = [
  { src: image1, alt: "lmao", text: "Verzenden" },
  { src: image2, alt: "lmao", text: "Nakijken" },
  { src: image3, alt: "lmao", text: "Kennis Making" },
];

// Generate gallery items based on images array
const galleryItems = images.map((image) => (
  <div className="galleryImages">
    <img src={image.src} alt={image.alt} />
    <div className="centered">{image.text}</div>
  </div>
));

function ProcessView() {
  const [windowWidth, setWindowWidth] = useState(window.innerWidth);

  useEffect(() => {
    // Add event listener to update window width on resize
    const handleResize = () => setWindowWidth(window.innerWidth);
    window.addEventListener("resize", handleResize);
    return () => window.removeEventListener("resize", handleResize);
  }, []);

  // Set gallery width based on window size
  const galleryWidth = windowWidth < 768 ? 560 : 1900;

  const settings = {
    dots: false,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    className: "center",
    centerMode: true,
    centerPadding: "720px",
    speed: 500,
    autoplay: true,
    speech: 1,
    cssEase: "linear",
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 728,
        settings: {
          centerPadding: "110px",
          dots: false,
          infinite: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          className: "center",
          centerMode: true,
          speed: 500,
          autoplay: true,
          speech: 1,
          cssEase: "linear",
          autoplaySpeed: 2000,
        },
      },
    ],
  };

  return (
    <div id="gallerView" style={{ width: `${galleryWidth}px` }}>
      <Slider {...settings}>{galleryItems}</Slider>
    </div>
  );
}

export default ProcessView;
