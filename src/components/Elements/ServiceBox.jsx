import React from "react";
import styled from "styled-components";

export default function ServiceBox({ image, title, subtitle }) {
  return (
    <Wrapper className="flex flexColumn">
      <ImageStyle src={image} alt={title} />
      <TitleStyle className="font20 extraBold">{title}</TitleStyle>
      <SubtitleStyle className="font13">{subtitle}</SubtitleStyle>
    </Wrapper>
  );
}

const Wrapper = styled.div`
  width: 100%;
`;

const ImageStyle = styled.img`
  width: 100px; /* Adjust size as needed */
  height: 100px;
  object-fit: contain;
  margin: 0 auto;
`;

const TitleStyle = styled.h2`
  width: 100%;
  max-width: 300px;
  margin: 0 auto;
  padding: 20px 0;
  @media (max-width: 860px) {
    padding: 20px 0;
  }
`;

const SubtitleStyle = styled.p`
  width: 100%;
  max-width: 300px;
  margin: 0 auto;
`;
