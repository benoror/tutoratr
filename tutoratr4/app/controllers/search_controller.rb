class SearchController < ApplicationController
  def index
    query = params[:tutor][:name]

    @tutors = Tutor.find(:all, :select => "id, name",
      :conditions => ["enabled = 't' AND LOWER(name) LIKE ?", "%#{query}%"], :limit => 10)

    @courses = Course.find(:all, :select => "id, ('['||code||'] '||name) AS name",
      :conditions => ["enabled = 't' AND LOWER(name) LIKE ? OR LOWER(code) LIKE ?", "%#{query}%", "%#{query}%"], :limit => 10)

    respond_to do |format|
      format.html # index.html.erb
      #format.xml  { render :xml => @tutors }
    end
  end

end
