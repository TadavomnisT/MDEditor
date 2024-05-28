(function() {
  var addMarkdown, buttonFunctions, buttonTypes, generatePenEmbed, matchString;

  buttonTypes = {
    addCode: "Enter code here",
    addInlineCode: "Enter inline code here",
    addStrong: "Strong text",
    addEmphasis: "Emphasized text",
    addLink: "https://www.codehive.io"
  };

  buttonFunctions = {
    addCode: `\`\`\`\n${buttonTypes.addCode}\n\`\`\`\n\n`,
    addInlineCode: `\`${buttonTypes.addInlineCode}\` `,
    addStrong: `**${buttonTypes.addStrong}** `,
    addEmphasis: `*${buttonTypes.addEmphasis}* `,
    addLink: `[Link title](${buttonTypes.addLink}) `
  };

  matchString = function(target, textAreaElement, limit) {
    var highlight, textArea;
    textArea = document.getElementById(textAreaElement.attr('id'));
    highlight = textArea.value.lastIndexOf(target, limit);
    if (highlight >= 0) {
      textArea.focus();
      textArea.selectionStart = highlight;
      return textArea.selectionEnd = highlight + target.length;
    }
  };

  generatePenEmbed = function(link) {
    var embed, name, nameBeg, nameEnd, pen, penBeg, penEnd;
    nameBeg = /.*codepen.io\//;
    nameEnd = /\/pen.*/;
    penBeg = /.*\/pen\//;
    penEnd = /\//;
    name = link.replace(nameBeg, "");
    name = name.replace(nameEnd, "");
    pen = link.replace(penBeg, "");
    pen = pen.replace(penEnd, "");
    embed = `<p data-height='350' data-theme-id='0' data-slug-hash='${pen}' data-default-tab='result' data-user='${name}' class='codepen'>See the <a href='https://codepen.io/${name}/pen/${pen}/'>Pen</a> by <a href='https://codepen.io/${name}'>@${name}</a> on <a href='https://codepen.io'>CodePen</a>.</p>`;
    return embed;
  };

  addMarkdown = function(buttonType, textArea) {
    var caretPosition, penLink, text;
    text = textArea.val();
    caretPosition = document.getElementById(textArea.attr('id')).selectionStart;
    if (buttonType === "embedCodePen") {
      penLink = prompt("Link to Pen");
      //TODO: Add some validation for CodePen link
      if (penLink) {
        generatePenEmbed(penLink);
        textArea.val(text.substring(0, caretPosition) + generatePenEmbed(penLink) + text.substring(caretPosition, text.length - 1));
      }
    }
    if (buttonType in buttonTypes) {
      textArea.val(text.substring(0, caretPosition) + buttonFunctions[buttonType] + text.substring(caretPosition, text.length - 1));
      return matchString(buttonTypes[buttonType], textArea, caretPosition + buttonTypes[buttonType].length - 1);
    }
  };

  $('.form-controls .button').on('click', function() {
    var buttonType, textArea;
    buttonType = $(this).data('button-type');
    textArea = $(this).parent().parent().find('textarea');
    return addMarkdown(buttonType, textArea);
  });

}).call(this);

//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiIiwic291cmNlUm9vdCI6IiIsInNvdXJjZXMiOlsiPGFub255bW91cz4iXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7QUFBQSxNQUFBLFdBQUEsRUFBQSxlQUFBLEVBQUEsV0FBQSxFQUFBLGdCQUFBLEVBQUE7O0VBQUEsV0FBQSxHQUNFO0lBQUEsT0FBQSxFQUFTLGlCQUFUO0lBQ0EsYUFBQSxFQUFlLHdCQURmO0lBRUEsU0FBQSxFQUFXLGFBRlg7SUFHQSxXQUFBLEVBQWEsaUJBSGI7SUFJQSxPQUFBLEVBQVM7RUFKVDs7RUFNRixlQUFBLEdBQ0U7SUFBQSxPQUFBLEVBQVMsQ0FBQSxRQUFBLENBQUEsQ0FBUSxXQUFXLENBQUMsT0FBcEIsQ0FBQSxZQUFBLENBQVQ7SUFDQSxhQUFBLEVBQWUsQ0FBQSxFQUFBLENBQUEsQ0FBSSxXQUFXLENBQUMsYUFBaEIsQ0FBQSxHQUFBLENBRGY7SUFFQSxTQUFBLEVBQVcsQ0FBQSxFQUFBLENBQUEsQ0FBSyxXQUFXLENBQUMsU0FBakIsQ0FBQSxHQUFBLENBRlg7SUFHQSxXQUFBLEVBQWEsQ0FBQSxDQUFBLENBQUEsQ0FBSSxXQUFXLENBQUMsV0FBaEIsQ0FBQSxFQUFBLENBSGI7SUFJQSxPQUFBLEVBQVMsQ0FBQSxhQUFBLENBQUEsQ0FBZ0IsV0FBVyxDQUFDLE9BQTVCLENBQUEsRUFBQTtFQUpUOztFQU1GLFdBQUEsR0FBYyxRQUFBLENBQUMsTUFBRCxFQUFTLGVBQVQsRUFBMEIsS0FBMUIsQ0FBQTtBQUNkLFFBQUEsU0FBQSxFQUFBO0lBQUUsUUFBQSxHQUFXLFFBQVEsQ0FBQyxjQUFULENBQXdCLGVBQWUsQ0FBQyxJQUFoQixDQUFxQixJQUFyQixDQUF4QjtJQUNYLFNBQUEsR0FBWSxRQUFRLENBQUMsS0FBSyxDQUFDLFdBQWYsQ0FBMkIsTUFBM0IsRUFBbUMsS0FBbkM7SUFDWixJQUFHLFNBQUEsSUFBYSxDQUFoQjtNQUNFLFFBQVEsQ0FBQyxLQUFULENBQUE7TUFDQSxRQUFRLENBQUMsY0FBVCxHQUEwQjthQUMxQixRQUFRLENBQUMsWUFBVCxHQUF3QixTQUFBLEdBQVksTUFBTSxDQUFDLE9BSDdDOztFQUhZOztFQVFkLGdCQUFBLEdBQW1CLFFBQUEsQ0FBQyxJQUFELENBQUE7QUFDbkIsUUFBQSxLQUFBLEVBQUEsSUFBQSxFQUFBLE9BQUEsRUFBQSxPQUFBLEVBQUEsR0FBQSxFQUFBLE1BQUEsRUFBQTtJQUFFLE9BQUEsR0FBVTtJQUNWLE9BQUEsR0FBVTtJQUNWLE1BQUEsR0FBUztJQUNULE1BQUEsR0FBUztJQUNULElBQUEsR0FBTyxJQUFJLENBQUMsT0FBTCxDQUFhLE9BQWIsRUFBc0IsRUFBdEI7SUFDUCxJQUFBLEdBQU8sSUFBSSxDQUFDLE9BQUwsQ0FBYSxPQUFiLEVBQXNCLEVBQXRCO0lBQ1AsR0FBQSxHQUFNLElBQUksQ0FBQyxPQUFMLENBQWEsTUFBYixFQUFxQixFQUFyQjtJQUNOLEdBQUEsR0FBTSxHQUFHLENBQUMsT0FBSixDQUFZLE1BQVosRUFBb0IsRUFBcEI7SUFDTixLQUFBLEdBQVEsQ0FBQSx1REFBQSxDQUFBLENBQTBELEdBQTFELENBQUEsdUNBQUEsQ0FBQSxDQUF1RyxJQUF2RyxDQUFBLHNEQUFBLENBQUEsQ0FBb0ssSUFBcEssQ0FBQSxLQUFBLENBQUEsQ0FBZ0wsR0FBaEwsQ0FBQSwwQ0FBQSxDQUFBLENBQWdPLElBQWhPLENBQUEsR0FBQSxDQUFBLENBQTBPLElBQTFPLENBQUEscURBQUE7QUFDUixXQUFPO0VBVlU7O0VBYW5CLFdBQUEsR0FBYyxRQUFBLENBQUMsVUFBRCxFQUFhLFFBQWIsQ0FBQTtBQUNkLFFBQUEsYUFBQSxFQUFBLE9BQUEsRUFBQTtJQUFFLElBQUEsR0FBTyxRQUFRLENBQUMsR0FBVCxDQUFBO0lBQ1AsYUFBQSxHQUFnQixRQUFRLENBQUMsY0FBVCxDQUF3QixRQUFRLENBQUMsSUFBVCxDQUFjLElBQWQsQ0FBeEIsQ0FBNEMsQ0FBQztJQUM3RCxJQUFHLFVBQUEsS0FBYyxjQUFqQjtNQUNFLE9BQUEsR0FBVSxNQUFBLENBQU8sYUFBUCxFQUFkOztNQUVJLElBQUcsT0FBSDtRQUNFLGdCQUFBLENBQWlCLE9BQWpCO1FBQ0EsUUFBUSxDQUFDLEdBQVQsQ0FBYSxJQUFJLENBQUMsU0FBTCxDQUFlLENBQWYsRUFBa0IsYUFBbEIsQ0FBQSxHQUFtQyxnQkFBQSxDQUFpQixPQUFqQixDQUFuQyxHQUErRCxJQUFJLENBQUMsU0FBTCxDQUFlLGFBQWYsRUFBOEIsSUFBSSxDQUFDLE1BQUwsR0FBYyxDQUE1QyxDQUE1RSxFQUZGO09BSEY7O0lBTUEsSUFBRyxVQUFBLElBQWMsV0FBakI7TUFDRSxRQUFRLENBQUMsR0FBVCxDQUFhLElBQUksQ0FBQyxTQUFMLENBQWUsQ0FBZixFQUFrQixhQUFsQixDQUFBLEdBQW1DLGVBQWUsQ0FBQyxVQUFELENBQWxELEdBQWlFLElBQUksQ0FBQyxTQUFMLENBQWUsYUFBZixFQUE4QixJQUFJLENBQUMsTUFBTCxHQUFjLENBQTVDLENBQTlFO2FBQ0EsV0FBQSxDQUFZLFdBQVcsQ0FBQyxVQUFELENBQXZCLEVBQXFDLFFBQXJDLEVBQStDLGFBQUEsR0FBZ0IsV0FBVyxDQUFDLFVBQUQsQ0FBWSxDQUFDLE1BQXhDLEdBQWlELENBQWhHLEVBRkY7O0VBVFk7O0VBYWQsQ0FBQSxDQUFFLHdCQUFGLENBQTJCLENBQUMsRUFBNUIsQ0FBK0IsT0FBL0IsRUFBd0MsUUFBQSxDQUFBLENBQUE7QUFDeEMsUUFBQSxVQUFBLEVBQUE7SUFBRSxVQUFBLEdBQWEsQ0FBQSxDQUFFLElBQUYsQ0FBTyxDQUFDLElBQVIsQ0FBYSxhQUFiO0lBQ2IsUUFBQSxHQUFXLENBQUEsQ0FBRSxJQUFGLENBQU8sQ0FBQyxNQUFSLENBQUEsQ0FBZ0IsQ0FBQyxNQUFqQixDQUFBLENBQXlCLENBQUMsSUFBMUIsQ0FBK0IsVUFBL0I7V0FDWCxXQUFBLENBQVksVUFBWixFQUF3QixRQUF4QjtFQUhzQyxDQUF4QztBQWhEQSIsInNvdXJjZXNDb250ZW50IjpbImJ1dHRvblR5cGVzID0gXG4gIGFkZENvZGU6IFwiRW50ZXIgY29kZSBoZXJlXCJcbiAgYWRkSW5saW5lQ29kZTogXCJFbnRlciBpbmxpbmUgY29kZSBoZXJlXCJcbiAgYWRkU3Ryb25nOiBcIlN0cm9uZyB0ZXh0XCJcbiAgYWRkRW1waGFzaXM6IFwiRW1waGFzaXplZCB0ZXh0XCJcbiAgYWRkTGluazogXCJodHRwczovL3d3dy5jb2RlaGl2ZS5pb1wiXG5cbmJ1dHRvbkZ1bmN0aW9ucyA9XG4gIGFkZENvZGU6IFwiYGBgXFxuI3tidXR0b25UeXBlcy5hZGRDb2RlfVxcbmBgYFxcblxcblwiXG4gIGFkZElubGluZUNvZGU6IFwiYCN7YnV0dG9uVHlwZXMuYWRkSW5saW5lQ29kZX1gIFwiXG4gIGFkZFN0cm9uZzogXCIqKiN7YnV0dG9uVHlwZXMuYWRkU3Ryb25nfSoqIFwiXG4gIGFkZEVtcGhhc2lzOiBcIioje2J1dHRvblR5cGVzLmFkZEVtcGhhc2lzfSogXCJcbiAgYWRkTGluazogXCJbTGluayB0aXRsZV0oI3tidXR0b25UeXBlcy5hZGRMaW5rfSkgXCJcblxubWF0Y2hTdHJpbmcgPSAodGFyZ2V0LCB0ZXh0QXJlYUVsZW1lbnQsIGxpbWl0KSAtPlxuICB0ZXh0QXJlYSA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKHRleHRBcmVhRWxlbWVudC5hdHRyKCdpZCcpKVxuICBoaWdobGlnaHQgPSB0ZXh0QXJlYS52YWx1ZS5sYXN0SW5kZXhPZih0YXJnZXQsIGxpbWl0KVxuICBpZiBoaWdobGlnaHQgPj0gMFxuICAgIHRleHRBcmVhLmZvY3VzKClcbiAgICB0ZXh0QXJlYS5zZWxlY3Rpb25TdGFydCA9IGhpZ2hsaWdodFxuICAgIHRleHRBcmVhLnNlbGVjdGlvbkVuZCA9IGhpZ2hsaWdodCArIHRhcmdldC5sZW5ndGhcblxuZ2VuZXJhdGVQZW5FbWJlZCA9IChsaW5rKSAtPlxuICBuYW1lQmVnID0gLy8vLipjb2RlcGVuLmlvXFwvLy8vXG4gIG5hbWVFbmQgPSAvLy9cXC9wZW4uKi8vL1xuICBwZW5CZWcgPSAvLy8uKi9wZW5cXC8vLy9cbiAgcGVuRW5kID0gLy8vXFwvLy8vXG4gIG5hbWUgPSBsaW5rLnJlcGxhY2UgbmFtZUJlZywgXCJcIlxuICBuYW1lID0gbmFtZS5yZXBsYWNlIG5hbWVFbmQsIFwiXCJcbiAgcGVuID0gbGluay5yZXBsYWNlIHBlbkJlZywgXCJcIlxuICBwZW4gPSBwZW4ucmVwbGFjZSBwZW5FbmQsIFwiXCJcbiAgZW1iZWQgPSBcIjxwIGRhdGEtaGVpZ2h0PSczNTAnIGRhdGEtdGhlbWUtaWQ9JzAnIGRhdGEtc2x1Zy1oYXNoPScje3Blbn0nIGRhdGEtZGVmYXVsdC10YWI9J3Jlc3VsdCcgZGF0YS11c2VyPScje25hbWV9JyBjbGFzcz0nY29kZXBlbic+U2VlIHRoZSA8YSBocmVmPSdodHRwczovL2NvZGVwZW4uaW8vI3tuYW1lfS9wZW4vI3twZW59Lyc+UGVuPC9hPiBieSA8YSBocmVmPSdodHRwczovL2NvZGVwZW4uaW8vI3tuYW1lfSc+QCN7bmFtZX08L2E+IG9uIDxhIGhyZWY9J2h0dHBzOi8vY29kZXBlbi5pbyc+Q29kZVBlbjwvYT4uPC9wPlwiXG4gIHJldHVybiBlbWJlZFxuICBcbiAgICBcbmFkZE1hcmtkb3duID0gKGJ1dHRvblR5cGUsIHRleHRBcmVhKSAtPlxuICB0ZXh0ID0gdGV4dEFyZWEudmFsKClcbiAgY2FyZXRQb3NpdGlvbiA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKHRleHRBcmVhLmF0dHIoJ2lkJykpLnNlbGVjdGlvblN0YXJ0XG4gIGlmIGJ1dHRvblR5cGUgPT0gXCJlbWJlZENvZGVQZW5cIlxuICAgIHBlbkxpbmsgPSBwcm9tcHQoXCJMaW5rIHRvIFBlblwiKVxuICAgICNUT0RPOiBBZGQgc29tZSB2YWxpZGF0aW9uIGZvciBDb2RlUGVuIGxpbmtcbiAgICBpZiBwZW5MaW5rXG4gICAgICBnZW5lcmF0ZVBlbkVtYmVkKHBlbkxpbmspXG4gICAgICB0ZXh0QXJlYS52YWwodGV4dC5zdWJzdHJpbmcoMCwgY2FyZXRQb3NpdGlvbikgKyBnZW5lcmF0ZVBlbkVtYmVkKHBlbkxpbmspICsgdGV4dC5zdWJzdHJpbmcoY2FyZXRQb3NpdGlvbiwgdGV4dC5sZW5ndGggLSAxKSlcbiAgaWYgYnV0dG9uVHlwZSBvZiBidXR0b25UeXBlc1xuICAgIHRleHRBcmVhLnZhbCh0ZXh0LnN1YnN0cmluZygwLCBjYXJldFBvc2l0aW9uKSArIGJ1dHRvbkZ1bmN0aW9uc1tidXR0b25UeXBlXSArIHRleHQuc3Vic3RyaW5nKGNhcmV0UG9zaXRpb24sIHRleHQubGVuZ3RoIC0gMSkpXG4gICAgbWF0Y2hTdHJpbmcoYnV0dG9uVHlwZXNbYnV0dG9uVHlwZV0sIHRleHRBcmVhLCBjYXJldFBvc2l0aW9uICsgYnV0dG9uVHlwZXNbYnV0dG9uVHlwZV0ubGVuZ3RoIC0gMSlcbiAgICBcbiQoJy5mb3JtLWNvbnRyb2xzIC5idXR0b24nKS5vbiAnY2xpY2snLCAoKSAtPlxuICBidXR0b25UeXBlID0gJCh0aGlzKS5kYXRhKCdidXR0b24tdHlwZScpXG4gIHRleHRBcmVhID0gJCh0aGlzKS5wYXJlbnQoKS5wYXJlbnQoKS5maW5kKCd0ZXh0YXJlYScpXG4gIGFkZE1hcmtkb3duKGJ1dHRvblR5cGUsIHRleHRBcmVhKVxuIl19
//# sourceURL=coffeescript