class Tutor < ActiveRecord::Base
	belongs_to :institution
	has_many :ratings
	has_many :courses, :through => :ratings
	
	validates_presence_of :name, :institution_id
	validates_uniqueness_of :name
	#validates_format_of :pic, 
	#										:with => %r{\.(gif|jpg|png)$}i, 
	#										:message => 'must be a URL for GIF, JPG ' + 
	#																'or PNG image.' 

        def to_param
          "#{id}_#{name.parameterize}"
        end

protected
        def self.paginate_tutors(page)
                paginate :per_page => 15, :page => page,
                         :order => 'updated_at DESC',
                         :conditions => "enabled = 't'"
        end
end
