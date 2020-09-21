# kollex Coding Challenge

Hi kollex, I hope you are going well. :)<br/>
I just ended my submission for your coding challenge.<br/>
My goal was to create a software as if I were in a professional situation, and to make the different components loosely coupled.
I tried do design my software in order to keep the application maintainable and extendable.<br/>

# Initialisation

I uploaded this repository on my Github account, you just need to clone it on a local repository to use it.
>**cd myfavoriterepository**<br/>
>**git clone https://github.com/karimmorel/kollex-coding-challenge.git**<br/>

I added a Docker-compose file, so you can launch this application easily :
>**cd kollex-coding-challenge**<br/>
>**docker-compose up**<br/>

The application should be accessible directly on your localhost: <a href="http://localhost/" target="_blank">localhost</a> (It is using the port 80)<br/>

If you want to access the index.php through your command line by calling the index.php file, you need to run this command : 
>**docker exec -it {{name-of-your-container}} php /var/www/html/index.php**

You can run tests using the same type of command : 
>**docker exec -it {{name-of-your-container}} /var/www/html/vendor/bin/phpunit /var/www/html/tests**

## The project

For this project, I focused on building reusable components, and on using design patterns to add new components easily in the future.<br/>
I added a UML representation of the application in the repository : <a href="https://github.com/karimmorel/kollex-coding-challenge/blob/master/uml_representation.jpg" target="_blank">UML representation</a>. I hope it will help you to understand quickly how it is designed.<br/>
Here the Mappers, Converters, Exporters and DataProviders are not deeply coupled to the ProductExportService component and they can be reused in other situations.<br/>

## Frameworks, components and design patterns

For this exercise, I first think that I would use a framework (Symfony or Laravel), but I thought the only component I would need to complete this exercise was a Validation Component in order to validate the properties values of each product. So I decided just to implement the Symfony/ValidationComponent to my project. I thought it would keep the application lighter and more simple.<br/><br/>
In the same logic, I thought it wasn't necessary to create a big environment for the Docker container, so I just implemented PHP with apache (I even thought providing only PHP but I think it is nice to access the application simply through the localhost link) to my container.<br/><br/>
I used the Facade design pattern, using a ProductExportService object in order to abstract the complexity of the application for the user of these objects.
I also inspired myself with the Factory Method design pattern for the interaction between Exporters and Converters, because the converter's initialisation is handled by the Exporter class, it is a little different here because any exporter can initialise any converter, but it helped me for this part of the application.<br/><br/>
Also I have been using the strategy pattern for the ProductExportService because the behaviour of the export() method is depending on the object's (ProductExportService) compositions, I didn't thought about it while coding, but it came naturally.<br/>

## Tests (PHPUnit)

On this project I decided to work with PHPUnit for testing the different components of the application. It is the testing framework I know the better so I wanted to work with it. <br/>
Each component is easy to test, because they are loosely coupled between them, allowing us to isolate them.
I tried first to test the failing cases, so when we are expecting a specific type of data or when we send them empty arguments. Then I test the working cases and I verify that the returned data is the good one.<br/>
I added some new Exceptions, for this exercise I used pretty explicits names (Product directly in the name of the exceptions) in order to make it easy to understand, but in a real application, I would have used more generic names, which are reusable in other components.

## Possible extensions

As I described it in some documentation of the code, I think the application can be extended in different ways : 
- Getting the data from other sources (Webservices, ERP systems) by adding new Exporters extending the AbstractExporter class.
- Handling some other types of files (xml, yaml...) by adding new Converter class implementing the ConverterInterface
- Adding new customer's representation of a product by adding new Mappers
- Providing the Data in other format than JSON by adding other DataProviders.

In terms of improvements, I think it will need to specify more the different Mappers, because here they are just mapping products assortment but may be later we could get Users. So I could have placed these Mappers in a Product folder, but here to keep it simple, I did not.<br/>

## Thank you :)

Thank you for your interest on my application, and for the time you are giving to this repository. I hope it will interest, I had a great time designing and developing it.<br/>
If you have any question, do not hesitate <a href="https://karimmorel.fr/" target="_blank">to contact me</a>.

Have a great day :)

Karim.