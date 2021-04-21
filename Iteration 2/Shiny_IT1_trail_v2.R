##Iteration 2 Bike Trails
library(shiny)
library(shinydashboard)
library(leaflet)
library(plotly)
library(tidyverse)
library(ggthemes)
library(htmltools)
library(lubridate)
library(ggplot2)
library(dplyr)
library(rlang)
library(data.table)
library(ggrepel)

library(maps)
library(leaflet.extras2)

#reading the wrangled dataset

data_trail <- read.csv("trail_coord.csv")
data_trail

data_sub <- read.csv("sub_trail.csv")
data_sub
ui <- fluidPage(
  #creating dashboard page
  dashboardPage(
                #creating dashboard header              
                dashboardHeader(disable = TRUE),
                dashboardSidebar(disable = TRUE),
                
                #creating the dashboard body
                dashboardBody(
                  
                  fluidPage(box(title = h4("Select your listed suburb"), background = "light-blue", width = 4, height = 720, 
                                
                               selectInput("sel_year","", c(unique(data_sub$Suburb))),
                               status =  "primary",       fluidRow (infoBoxOutput("trail1", width = 1)),
                                           fluidRow(infoBoxOutput("trail2", width = 1)),
                                           fluidRow(infoBoxOutput("trail3", width = 1))),

                   
                   box(leafletOutput("mapPlot1", height = "700px"), width = 8)
                    
                  )
                  
                  )                  
                    
                           
                           
                  )
                  
                )

#server
server <- (function(input, output){
  #leaflet plot  
  
 
 output$mapPlot1 <- renderLeaflet({
   monthCol <- c("purple", "green", "coral")
  catMap <- leaflet() %>% addProviderTiles(providers$CartoDB.Positron)
  for (i in 1:length(unique(data_trail$trail))) {
    m<-unique(data_ca()$Trail)[i]
    catMap <- catMap  %>%  
      addCircles (data_trail[data_trail$trail
                                   ==m,"long"],
                   data_trail[data_trail$trail
                                   ==m,"lat"],popup = m,radius = 0.5,
                 col=monthCol[i], group=m)   
  }
  catMap  %>%
    addLayersControl(
      overlayGroups = data_ca()$Trail, 
      options = layersControlOptions(collapsed = FALSE))
  
 })
  
 
  
  data_ca <- reactive({
    data_sub %>%
      filter(Suburb %in% input$sel_year)
  })
  
  
  
  data_cause <- reactive({
    data_trail %>%
      filter(trail %in% input$trail)
  })
  
  
  
  output$trail1 <- renderInfoBox({
    
    infoBox(title = "Trail 1",
            value = data_ca()$Trail[1], subtitle = data_ca()$Length[1], color = "purple", icon = icon('road'))

    
  })
  
  output$trail2 <- renderInfoBox({
    infoBox(title = "Trail 2",
            value = data_ca()$Trail[2], subtitle = data_ca()$Length[2], color= "green" ,icon = icon('road'))
  
    
  })
  
  output$trail3 <- renderInfoBox({
    infoBox(title = "Trail 3",
            value = data_ca()$Trail[3], subtitle = data_ca()$Length[3], color = "orange", icon = icon('road'))
    
    
  })
 
  
  
  
})
#shinyApp implementation
shinyApp(ui = ui, server = server )

